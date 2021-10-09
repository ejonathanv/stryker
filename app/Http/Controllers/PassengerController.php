<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
class PassengerController extends Controller
{

    public function index()
    {
        $passengers = Passenger::orderBy('first_name')->paginate(10);
        return view('app.passengers.index', compact('passengers'));
    }

    public function create()
    {
        return view('app.passengers.create');
    }

    public function show(Passenger $passenger){
        return view('app.passengers.show', compact('passenger'));
    }

    public function store(Request $request)
    {

        $validate = Validator::make(
            $request->all(), 
            $this->validationRules(), 
            $this->validationMessages()
        )->validate();


        $newPassenger = new Passenger();
        $passenger = $this->storeOrUpdatePassenger($request, $newPassenger);

        return redirect()
            ->route('passengers.show', $passenger)
            ->with('message', "Se agrego correctamente a {$passenger->full_name}");

    }

    public function storeOrUpdatePassenger($request, $passenger)
    {

        if($request->company){
            $company = Company::firstOrCreate([
                'name' => $request->company,
            ]);
        }else{
            $company = null;
        }

        $passenger->company_id = $company ? $company->id : null;
        $passenger->first_name = $request->first_name;
        $passenger->last_name  = $request->last_name;
        $passenger->email      = $request->email;
        $passenger->gender     = $request->gender;
        $passenger->jobtitle   = $request->jobtitle;
        $passenger->phone      = $request->phone;
        $passenger->fmm        = boolval($request->fmm) ? 1 : 0;

        $passenger->save();
        
        return $passenger;
    }

    public function update(Request $request, Passenger $passenger)
    {

        $validate = Validator::make(
            $request->all(), 
            $this->validationRules($passenger->id), 
            $this->validationMessages()
        )->validate();

        $this->storeOrUpdatePassenger($request, $passenger);

        return redirect()->back()->with('message', 'La información ha sido actualizada.');

    }

    public function validationRules($passengerId = null)
    {
        return [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => [
                'nullable',
                'email',
                Rule::unique('passengers')->ignore($passengerId)
            ],
            'gender'     => 'required|in:Male,Female',
            'company'    => 'nullable|string',
            'jobtitle'   => 'nullable|string',
            'phone'      => 'nullable|string',
        ];
    }

    public function validationMessages()
    {
        return [
            'first_name.required' => 'El nombre del pasajero es requerido',
            'first_name.string'   => 'El nombre del pasajero no es válido',
            'last_name.required'  => 'El apellido del pasajero es requerido',
            'last_name.string'    => 'El apellido del pasajero no es válido',
            'email.email'         => 'El correo electrónico no es válido',
            'email.unique'        => 'El correo electrónico ya se encuentra registrado',
            'gender.required'     => 'El género del pasajero es requerido',
            'gender.in'           => 'El género seleccionado no es válido',
            'company.string'      => 'La compañía proporcionada no es válida',
            'jobtitle.string'     => 'El puesto laboral del pasajero no es válido',
            'phone.string'        => 'El telefono del pasajero no es válido',
        ];
    }

}
