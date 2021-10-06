<?php
namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\TripDriver;
use App\Models\TripPassenger;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
class TripController extends Controller
{
    public function index(){
    }
    public function create(){
        return view('app.trips.create');
    }
    public function store(Request $request){
        $rules = [
            'title' => 'required|string',
            'address' => 'required|string',
            'date' => 'required|date' 
        ];
        $messages = [   
            'title.required' => 'Agrega el título de el viaje',
            'title.string' => 'El título no es válido',
            'address.required' => 'Agrega la dirección del viaje',
            'address.string' => 'La dirección no es válida',
            'date.required' => 'La fecha es requerida',
            'date.date' => 'La fecha no es válida',
        ];
        $validate = Validator::make($request->all(), $rules, $messages)->validate();
        $trip = new Trip();
        $trip->title = $request->title;
        $trip->address = $request->address;
        $trip->date = Carbon::parse($request->date);
        $trip->save();
        return redirect()->route('trips.show', $trip)->with('message', "Se ha creado un nuevo viaje.");
    }
    public function show(Trip $trip){
        return view('app.trips.show', compact('trip'));
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
            'driver.exists' => 'El conductor seleccionado no es válido',
            'vehicle.required' => 'Elige un vehículo',
            'vehicle.exists' => 'El vehículo seleccionado no es válido',
            'from.required' => 'Define la dirección donde inicia el viaje',
            'from.string' => 'La dirección proporcionada no es válida',
            'from_time.required' => 'Define la hora de inicio del viaje',
            'from_time.date_format' => 'La hora seleccionada no es válida',
            'to.required' => 'Define la dirección donde termina el viaje',
            'to.string' => 'La dirección proporcionada no es válida',
            'to_time.required' => 'Define la hora en que finaliza el viaje',
            'to_time.date_format' => 'La hora seleccionada no es válida',
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
        $tripPassenger = new TripPassenger();
        $tripPassenger->passenger_id = $request->passenger;
        $tripPassenger->trip_id = $trip->id;
        $tripPassenger->trip_driver_id = $trip->drivers->first()->id;
        $tripPassenger->save();

        return redirect()->back()->with('message', "Se ha agregado a {$tripPassenger->passenger->full_name} al viaje");
    }

    public function removePassenger(TripPassenger $tripPassenger){
        $tripPassenger->delete();
        return redirect()->back();
    }

}