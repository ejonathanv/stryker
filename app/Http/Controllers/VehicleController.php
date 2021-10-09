<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Validator;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::orderBy('brand')->paginate(10);
        return view('app.vehicles.index', compact('vehicles'));
    }


    public function show(Vehicle $vehicle){
        return view('app.vehicles.show', compact('vehicle'));
    }

    public function create(){
        return view('app.vehicles.create');
    }

    public function store(Request $request){
        $validate = Validator::make(
            $request->all(),
            $this->validationRules(),
            $this->validationMessages()
        )->validate();
        
        $vehicle = new Vehicle();
        $vehicle->vehicle_id = hexdec(uniqid());
        $vehicle->type = $request->type;
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->plates = $request->plates;
        $vehicle->plates_region = $request->plates_region;
        $vehicle->color = $request->color;
        $vehicle->capacity = $request->capacity;

        $vehicle->save();

        if($request->has('picture')){
            $vehicle->picture = $this->uploadPicture($request, $vehicle);
            $vehicle->save();
        }

        return redirect()->route('vehicles.show', $vehicle)->with('message', 'Se agrego un nuevo vehículo correctamente.');

    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validate = Validator::make(
            $request->all(),
            $this->validationRules(),
            $this->validationMessages()
        )->validate();

        $vehicle->type = $request->type;
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->plates = $request->plates;
        $vehicle->plates_region = $request->plates_region;
        $vehicle->color = $request->color;
        $vehicle->capacity = $request->capacity;
        $vehicle->save();

        if($request->has('picture')){
            $vehicle->picture = $this->uploadPicture($request, $vehicle);
            $vehicle->save();
        }

        return redirect()->back()->with('message', 'La información del vehículo ha sido actualizada.');
    }

    public function uploadPicture($request, $vehicle){
        $picture = $request->file('picture');
        $name = hexdec(uniqid());
        $ext = $picture->getClientOriginalExtension();
        $root = public_path() . '/vehicles/' . $vehicle->vehicle_id;
        $fileName = "{$name}.{$ext}";
        $picture->move($root, $fileName);
        return $fileName;
    }

    public function validationRules(){
        return [
            'picture' => 'sometimes|nullable|image|max:3000',
            'type' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|numeric',
            'plates' => 'required|string',
            'plates_region' => 'required|string',
            'color' => 'required|string',
            'capacity' => 'required|numeric',
        ];
    }

    public function validationMessages(){
        return [
            'picture.image' => 'La foto del vehículo debe tener un formato de imagen (.jpg ó .png)',
            'picture.max' => 'La foto del vehículo debe pesar máximo 3MB',
            'type.required' => 'El tipo del vehículo es requerido',
            'brand.required' => 'La marca del vehículo es requerida',
            'model.required' => 'El modelo del vehículo es requerido',
            'year.required' => 'El año del vehículo es requerido',
            'year.numeric' => 'El año debe ser un número',
            'plates.required' => 'El número de placas es requerido',
            'plates_region.required' => 'La región de las placas es requerida',
            'color.required' => 'El color del vehículo es requerido',
            'capacity.required' => 'La capacidad del vehículo es requerida',
            'capacity.numeric' => 'La capacidad del vehículo debe ser un número'
        ];
    }

}
