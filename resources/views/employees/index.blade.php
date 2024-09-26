@extends('adminlte')

@section('form_content')
<h1>Lista de Empleados</h1>

<div class="d-flex justify-content-end my-3">
    <a class="btn btn-general" href="{{ route('employee.create') }}"> <i class="fas fa-briefcase mr-1"></i> Agregar</a>
</div>

<div class="d-flex justify-content-start my-3">
    <form action="{{ route('employee.index') }}" method="GET" class="form-inline">
    <input type="text" name="search" class="form-control mr-2" placeholder="Buscar por identificacion" value="{{ request()->get('search') }}">
    <button type="submit" class="btn btn-general">Buscar </button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Identificacion</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->document }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{$user->city->name ?? ''}}</td>
                    <td>{{ $user->city->country->name  ?? ''}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('employee.edit', $user->id) }}" class="btn btn-general mr-2"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('employee.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-general"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@stop
