<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Employee;

class employeesController extends Controller
{
 
     public function index()
   {
       return view ('employees/principal');
   }

    //Users form
   public function userForm()
   {
       return view ('employees/userform');
   }

   //Save users
   public function save(Request $request){
      $validator = $this->validate($request, [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:employees',
        'birthdate' => 'required|date',
        'cellphone' => 'required|max:255',
        'charge' => 'required|string|max:255'
       ]);
  $userdata = request()->except('_token');
    Employee::insert($userdata);
    return back()->with('estudianteAlmacenado', 'Estudiante Almacenado');
   }
    //List users
   public function list()
   {
    $data['users'] = Employee::paginate(5);
     return view ('employees/list', $data);
    }
    //Delete Users
    public function delete($id)
    {
      Employee::destroy($id);
      return back()->with('estudianteEliminado', 'Estudiante Eliminado');
    }
    //Edition form
    public function editForm ($id)
    {
       $usuario = Employee::findOrFail($id);
          return view ('employees/editform', compact('usuario'));
    }
     public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));
        Employee::where('id', '=', $id)->update($datosUsuario);

        return back()->with('estudianteEditado','Estudiante modificado');
    }
}
