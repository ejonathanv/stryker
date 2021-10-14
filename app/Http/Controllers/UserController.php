<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('first_name')->paginate(10);
        return view('app.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            $this->validationRules(),
            $this->validationMessages()
        )->validate();

        $user             = new User();
        $user->user_id    = hexdec(uniqid());
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->role       = $request->role;
        $user->password   = $this->generatePassword();
        $user->save();

        return redirect()->route('users.show', $user)->with('message', "Se ha agregado al usuario {$user->full_name} existosamente.");

    }

    public function generatePassword()
    {
        $bytes    = random_bytes(20);
        $hex      = bin2hex($bytes);
        $password = substr($hex, 0, 7);
        info($password);
        return \Hash::make($password);
    }

    public function validationRules($id = null)
    {
        return [

            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'role'       => 'required|string|in:admin,user,passenger',
            'password' => 'sometimes|nullable|confirmed|min:6|max:15'

        ];
    }

    public function validationMessages()
    {
        return [
            'first_name.required' => 'El nombre del usuario es requerido',
            'last_name.required'  => 'El apellido del usuario es requerido',
            'email.required'      => 'El correo electrónico del usuario es requerido',
            'email.email'         => 'El correo electrónico proporcionado no es válido',
            'email.unique'        => 'El correo electrónico ya se encuentra registrado',
            'role.required'       => 'El role del usuario es requerido',
            'role.in'             => 'El role seleccionado no es válido',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'password.max' => 'La contraseña debe contener máximo 15 caracteres',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('app.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('app.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validation = Validator::make(
            $request->all(),
            $this->validationRules($user->id),
            $this->validationMessages()
        )->validate();

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->role       = $request->role;

        $response = 'La información del usuario ha sido actualizada.';

        if ($request->password) {
            $user->password = \Hash::make($request->password);
            $response = 'La información del usuario ha sido actualizada y se restauro la contraseña.';
        }

        $user->save();

        return redirect()->route('users.show', $user)->with('message', $response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message', 'El usuario ha sido eliminado.');
    }
}
