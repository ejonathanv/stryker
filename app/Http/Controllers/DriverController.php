<?php
namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
class DriverController extends Controller
{
    public function index(){
        $drivers = Driver::paginate(10);
        return view('app.drivers.index', compact('drivers'));
    }
    public function create(){
        return view('app.drivers.create');
    }
    public function store(Request $request){
        
        $validate = Validator::make(
            $request->all(), 
            $this->validationRules(), 
            $this->validationMessages()
        )->validate();

        $driverUser = new User();
        $driverUser->user_id = hexdec(uniqid());
        $driverUser->first_name = $request->first_name;
        $driverUser->last_name = $request->last_name;
        $driverUser->email = $request->email;
        $driverUser->password = $this->generatePassword();
        $driverUser->save();

        $driver = new Driver();
        $driver->user_id = $driverUser->id;
        $driver->phone = $request->phone;
        if($request->has('avatar')){
            $driver->avatar = $this->uploadAvatar($request, $driverUser);
        }
        $driver->save();

        return redirect()->route('drivers.show', $driver)->with('message', "Se agrego a {$driverUser->first_name} como conductor.");

    }

    public function show(Driver $driver){
        $driverTrips = $driver->trips()->pluck('trip_id');
        $trips = Trip::whereIn('id', $driverTrips)->paginate(10);
        return view('app.drivers.show', compact('driver', 'trips'));
    }

    public function edit(Driver $driver){
        return view('app.drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $validate = Validator::make(
            $request->all(), 
            $this->validationRules($driver->user->id), 
            $this->validationMessages()
        )->validate();

        $user = $driver->user;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();

        $driver->phone = $request->phone;
        if($request->has('avatar')){
            $driver->avatar = $this->uploadAvatar($request, $user);
        }
        $driver->save();

        return redirect()->back()->with('message', 'La información del conductor ha sido actualizada');

    }

    public function uploadAvatar($request, $user){

        $avatar = $request->file('avatar');
        $name = hexdec(uniqid());
        $ext = $avatar->getClientOriginalExtension();
        $root = public_path() . '/avatars/' . $user->user_id;
        $fileName = "{$name}.{$ext}";
        $avatar->move($root, $fileName);
        return $fileName;
    }

    public function generatePassword(){
        $bytes = random_bytes(20);
        $hex = bin2hex($bytes);
        $password = substr($hex, 0, 7);
        info($password);
        return \Hash::make($password);
    }

    public function validationRules($userId = null){
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId)
            ],
            'phone' => 'required|string',
            'avatar' => 'nullable|image|max:3000'
        ];
    }
    public function validationMessages(){
        return [
            'first_name.required' => 'Por favor ingresa el nombre del conductor',
            'first_name.string' => 'El nombre del conductor no es válido',
            'last_name.required' => 'Por favor ingresa el apellido del conductor',
            'last_name.string' => 'El apellido del conductor no es válido',
            'email.required' => 'Por favor ingresa el correo electrónico del conductor',
            'email.email' => 'El correo electrónico proporcionado no es válido',
            'email.unique' => 'El correo electrónico ya se encuentra registrado',
            'phone.required' => 'Por favor ingresa el numero telefónico del conductor',
            'phone.string' => 'El número telefónico no es válido',
            'avatar.image' => 'La foto del conductor debe ser una imagen (.jpg, .png)',
            'avatar.max' => 'La foto del conductor debe pesar menos de 3MB',
        ];
    }
}