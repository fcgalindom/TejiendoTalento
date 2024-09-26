@extends('adminlte')
@section('title_content')
<form action="{{ route('charges.store') }}" method="POST">
    @csrf
    @if(!empty($employee))
        <input type="hidden" name="id" value="{{ $employee[0]->id }}">
        <input type="hidden" name="charge_id" value="{{ $employee[0]->charge->id }}">
    @endif
    <div class="row">
        <div class="col-md-4">
            <label for="country">Nombre:</label>
            <select class="form-control js-example-basic-single" name="userget" id="userget" required>
            <option value="{{ isset($employee) ? $employee[0]->user->id : "" }}">{{ isset($employee) ? $employee[0]->user->name : "Selecione un usuario" }}</option>
            @foreach($users as $user)
             <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="area">Area:</label>
            <input class="form-control" type="text" name="area" id="area" value="{{ isset($employee) ? $employee[0]->charge->area : '' }}" required>
        </div>
        <div class="col-md-4">
            <label for="area">Cargo:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ isset($employee) ? $employee[0]->charge->name : '' }}" required>
        </div>
        <div class="col-md-4">
            <label for="area">Rol:</label>
            <select class="form-control" name="rol" id="rol" required>
                <option value="">Seleccione un rol</option>
                <option value="jefe" >Jefe</option>
                <option value="Colaborador(a)">Colaborador(a)</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="country">Jefe:</label>
            <select class="form-control js-example-basic-single" name="userboss" id="userboss" required>
                <option value="{{ isset($employee) ? $employee[0]->boss->id : "" }}">{{ isset($employee) ? $employee[0]->boss->name : "Selecione un jefe" }}</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
            </select>
        </div>
        
        

    </div>
    <div class="mt-4">
        <button class="btn btn-general" type="submit">{{ isset($employee) ? 'Actualizar' : 'Guardar' }}</button>
    </div>
    
</form>
@stop