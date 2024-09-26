<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $search = $request->get('search');
         
         // Cargar usuarios con la relación city.country y aplicar el filtro de búsqueda
         $users = User::with(['city.country'])
                     ->where('document', 'like', '%' . $search . '%')
                     ->where('state', 1)
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
         
         // Obtener todos los usuarios para el select
         $allUsers = User::all();
     
         return view('employees.index', compact('users', 'allUsers'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('employees.create', compact('countries'));
    } 
    public function edit($id)
    {
     
      $employee = User::findOrFail($id);
      $countries = Country::all();
      return view('employees.create', compact('employee', 'countries')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->id == null) {
            $user = new User();
        } else {
            $user = User::find($request->id);
        }
        $user->name = $request->name;
        $user->document = $request->document;
        $user->address= $request->address;
        $user->phone = $request->phone;
        $user->city_id = $request->city;
        $user->save();
        return redirect()->route('employee.index')->with('success', 'Succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Buscar el usuario por su ID
    
    $user = User::findOrFail($id);
    $user->state = 0;
    $user->save();


    // Redirigir a la vista de índice con un mensaje de éxito
    return redirect()->route('employee.index')->with('success', 'Success');
}
}
