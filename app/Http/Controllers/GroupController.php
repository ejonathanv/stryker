<?php
namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;
use Validator;
use PDF;
class GroupController extends Controller
{

    public function index(){

        $groups = Group::orderBy('name')->paginate(10);
        return view('app.groups.index', compact('groups'));

    }

    public function show(Group $group){
        $trips = $group->trips()->paginate(10);
        return view('app.groups.show', compact('group', 'trips'));
    }

    public function create(){
        return view('app.groups.create');
    }

    public function update(Request $request, Group $group){
        
        $validate = Validator::make(
            $request->all(), 
            $this->validationRules(), 
            $this->validationMessages()
        );

        $group->name = $request->name;
        $group->save();

        return redirect()->back()->with('message', "Se actualizó el nombre del grupo");

    }

    public function validationRules(){
        return [
            'name' => 'required|unique:groups'
        ];
    }

    public function validationMessages(){

        return [
            'name.required' => 'El nombre del grupo es requerido',
            'name.unique' => 'Ya existe un grupo con el mismo nombre'
        ];
    }


    public function exportToPdf(Request $request, Group $group)
    {

        $trips = $group->trips()->orderBy('date', 'asc')->get();

        $data = [
            'group' => $group,
            'trips' => $trips
        ];

        return PDF::loadView('app.groups.pdf.trips', $data)
            ->stream($group->group_id . '.pdf');
    }

}