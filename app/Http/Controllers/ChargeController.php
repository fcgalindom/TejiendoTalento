<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Employee;
use App\Models\EmployeeCharge;
use Illuminate\Http\Request;
use App\Models\User;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userDocument = $request->input('user_document');

        $charges = EmployeeCharge::with(['charge', 'user', 'boss'])
           ->whereHas('charge', function ($query) {
             $query->where('state', 1);
         })
         ->whereHas('user', function ($query) use ($userDocument) {
             $query->where('state', 1);
             if ($userDocument) {
                 $query->where('document', 'like', '%' . $userDocument . '%');
             }
         })
          ->paginate();

        return view('charges.index', compact('charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state', 1)->get();
        return view('charges.create', compact('users'));
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
            $charge = new Charge();
            $employeeCharge = new EmployeeCharge();
        } else {
            $employeeCharge  = EmployeeCharge::find($request->id);
            $charge  = Charge::find($request->charge_id);
        }
      
        $user = User::find($request->userget);

        $charge->name = $request->name;
        $charge->area = $request->area;
        $user->rol = $request->rol;
        $user->save();

        $charge->save();

        $employeeCharge->charge_id = $charge->id;
        $employeeCharge->user_id = $user->id;
        $employeeCharge->boss_id = $request->userboss;
        $employeeCharge->save();

        return redirect()->route('charges.index')->with('success', 'Charge created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = EmployeeCharge::with(['charge', 'user', 'boss'])
        ->where('id', $id)->get();

        $users = User::where('state', 1)->get();
        return view('charges.create', compact('employee','users')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charge $charge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $charge = Charge::findOrFail($id);
        $charge->state = 0;
        $charge->save();


        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('charges.index')->with('success', 'Success');
    }
}
