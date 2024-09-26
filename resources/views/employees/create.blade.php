@extends('adminlte')

@section('title_content')
@if(empty($employee))
<h2>Agregar</h2>
@else
<h2>Editar</h2>
@endif
@stop
@section('form_content')
<form action="{{route('employee.store') }}" method="POST">
    @csrf
    @if(!empty($employee))
        <input type="hidden" name="id" value="{{ $employee->id }}">
    @endif
    <div class="row">
        <div class="col-md-4">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ isset($employee) ? $employee->name : '' }}" required>
        </div>
        <div class="col-md-4">
            <label for="identification">Identificación:</label>
            <input class="form-control" type="number" name="document" id="document" value="{{ isset($employee) ? $employee->document : '' }}" required>
        </div>
        <div class="col-md-4">
            <label for="address">Dirección:</label>
            <input class="form-control" type="text" name="address" id="address" value="{{ isset($employee) ? $employee->address : '' }}" required>
        </div>

        <div class="col-md-4">
            <label for="phone">Teléfono:</label>
            <input class="form-control" type="number" name="phone" id="phone" value="{{ isset($employee) ? $employee->phone : '' }}" required>
        </div>
        <div class="col-md-4">
            <label for="country">País:</label>
            <select class="form-control js-example-basic-single" name="country" id="country" required>
                <option value="">Seleccione un país</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ isset($employee) && $employee->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="city">Ciudad:</label>
            <select class="form-control" name="city" id="city" required>
                <option value="">Seleccione una ciudad</option>
            </select>
        </div>
    </div>

    <div class="mt-4">
        <button class="btn btn-success" type="submit">{{ isset($employee) ? 'Actualizar' : 'Guardar' }}</button>
    </div>
</form>


@stop



