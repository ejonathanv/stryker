<?php
namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\TripDriver;
use App\Models\TripPassenger;
use Carbon\Carbon;
use Validator;
use PDF;
use Illuminate\Http\Request;
class TripController extends Controller
{

    public function __construct(){

        $this->middleware('role:admin')
            ->only(['create', 'store', 'update']);

    }

    public function index(){
        $user = auth()->user();
        $trips = $this->getTripsByUserRole($user);
        return view('app.trips.index', compact('trips'));
    }

    public function getTripsByUserRole($user){
        $trips = null;
        if($user->role == 'admin'){
            $trips = Trip::orderBy('date', 'desc')->paginate(10); 
        }elseif($user->role == 'user'){
            $driver = $user->driver;
            $tripsIds = $driver->trips->pluck('trip_id');
            $trips = Trip::whereIn('id', $tripsIds)
                ->orderBy('date', 'desc')
                ->paginate(10);
        }
        return $trips;
    }

    public function create(){
        return view('app.trips.create');
    }
    public function store(Request $request){
        $validate = Validator::make(
            $request->all(), 
            $this->validationRules(), 
            $this->validationMessages()
        )->validate();

        $trip = new Trip();
        $trip->trip_id = hexdec(uniqid());
        $trip->group_id = $request->group;
        $trip->title = $request->title;
        $trip->address = $request->address;
        $trip->date = Carbon::parse($request->date);
        $trip->status = $request->status;
        $trip->save();

        return redirect()->route('trips.show', $trip)->with('message', "Se ha creado un nuevo viaje.");
    }

    public function validationRules(){
        return [
            'title' => 'required|string',
            'group' => 'sometimes|nullable|exists:groups,id',
            'address' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|in:1,2,3' 
        ];
    }

    public function validationMessages(){
        return [   
            'title.required' => 'Agrega el t??tulo de el viaje',
            'title.string' => 'El t??tulo no es v??lido',
            'group.exists' => 'El grupo seleccionado no es v??lido',
            'address.required' => 'Agrega la direcci??n del viaje',
            'address.string' => 'La direcci??n no es v??lida',
            'date.required' => 'La fecha es requerida',
            'date.date' => 'La fecha no es v??lida',
            'status.required' => 'Selecciona el estatus del viaje',
            'status.in' => 'El estatus seleccionado no es v??lido'
        ];
    }

    public function show(Trip $trip){
        return view('app.trips.show', compact('trip'));
    }

    public function update(Request $request, Trip $trip){

        $validate = Validator::make(
            $request->all(), 
            $this->validationRules(), 
            $this->validationMessages()
        )->validate();


        $trip->group_id = $request->group;
        $trip->title = $request->title;
        $trip->address = $request->address;
        $trip->date = Carbon::parse($request->date);
        $trip->status = $request->status;
        $trip->save();

        return redirect()->back()->with('message', "La informaci??n ha sido actualizada");
    }

    public function setDriver(Request $request, Trip $trip){
        $rules = [
            'driver' => 'required|exists:drivers,id',
            'vehicle' => 'required|exists:vehicles,id',
            'from' => 'required|string',
            'from_time' => 'required|date_format:H:i',
            'to' => 'required|string',
            'to_time' => 'required|date_format:H:i'
        ];
        $messages = [
            'driver.required' => 'Elige a un conductor',
            'driver.exists' => 'El conductor seleccionado no es v??lido',
            'vehicle.required' => 'Elige un veh??culo',
            'vehicle.exists' => 'El veh??culo seleccionado no es v??lido',
            'from.required' => 'Define la direcci??n donde inicia el viaje',
            'from.string' => 'La direcci??n proporcionada no es v??lida',
            'from_time.required' => 'Define la hora de inicio del viaje',
            'from_time.date_format' => 'La hora seleccionada no es v??lida',
            'to.required' => 'Define la direcci??n donde termina el viaje',
            'to.string' => 'La direcci??n proporcionada no es v??lida',
            'to_time.required' => 'Define la hora en que finaliza el viaje',
            'to_time.date_format' => 'La hora seleccionada no es v??lida',
        ];
        $validate = Validator::make($request->all(), $rules, $messages)->validate();

        $trip->drivers()->delete();

        $tripDriver = new TripDriver();
        $tripDriver->trip_id = $trip->id;
        $tripDriver->driver_id = $request->driver;
        $tripDriver->vehicle_id = $request->vehicle;
        $tripDriver->from = $request->from;
        $tripDriver->from_time = Carbon::parse($request->from_time);
        $tripDriver->to = $request->to;
        $tripDriver->to_time = Carbon::parse($request->to_time);
        $tripDriver->save();
        return redirect()->back()->with('message', "Se agrego el conductor y el vehiculo al viaje");
    }
    public function addPassenger(Request $request, Trip $trip){
        $rules = [
            'passenger' => 'required.exists:passengers,id'
        ];
        $messages = [
            'passenger.required' => 'El pasajero es requerido',
            'passenger.exists' => 'El pasajero no existe'
        ];
        $validate = Validator::make($request->all(), $rules, $messages);

        $alreadyAdded = $this->validateIfPassengerIsAlreadyAdded($request, $trip);

        if(!count($alreadyAdded)){

            $tripPassenger = new TripPassenger();
            $tripPassenger->passenger_id = $request->passenger;
            $tripPassenger->trip_id = $trip->id;
            $tripPassenger->trip_driver_id = $trip->drivers->first()->id;
            $tripPassenger->save();

            return redirect()->back()->with('message', "Se ha agregado a {$tripPassenger->passenger->full_name} al viaje");
        }else{

            return redirect()->back()->withErrors([
                'passenger' => 'El pasajero seleccionado ya se encuentra agregado al viaje.'
            ]);

        }

    }

    public function validateIfPassengerIsAlreadyAdded($request, $trip)
    {
        
        $alreadyAdded = $trip->passengers->where('passenger_id', $request->passenger);

        return $alreadyAdded;
    }

    public function removePassenger(TripPassenger $tripPassenger){
        $tripPassenger->delete();
        return redirect()->back();
    }

    public function exportToPdf(Request $request, Trip $trip)
    {
        $data = [
            'trip' => $trip
        ];

        return PDF::loadView('app.trips.pdf.trip', $data)
            ->stream($trip->trip_id . '.pdf');
    }

}