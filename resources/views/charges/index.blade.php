@extends('adminlte')

@section('form_content')
    <h1>Lista de Cargos</h1>

    <div class="d-flex justify-content-end my-3">
        <a class="btn btn-general" href="{{ route('charges.create') }}"> <i class="fas fa-briefcase mr-1"></i> Agregar</a>
    </div>
    <div class="d-flex justify-content-start my-3">
        <form action="{{ route('charges.index') }}" method="GET" class="form-inline">
            <input type="text" name="user_document" class="form-control mr-2" placeholder="Buscar por nombre de usuario" value="{{ request()->get('user_name') }}">
            <button type="submit" class="btn btn-general">Buscar</button>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Identificacion</th>
                <th>Area</th>
                <th>Cargo</th>
                <th>Rol</th>
                <th>Jefe</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($charges as $charge)
                    <tr>
                        <td>{{ $charge->user->name }}</td>
                        <td>{{ $charge->user->document }}</td>
                        <td>{{ $charge->charge->area }}</td>
                        <td>{{ $charge->charge->name }}</td>
                        <td>{{ $charge->user->rol }}</td>
                        <td>{{ $charge->boss->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('charges.edit', $charge->id) }}" class="btn btn-general mr-2"><i class="fas fa-pen"></i></a>
                                <form action="{{ route('charges.destroy', $charge->charge->id) }}" method="POST" style="display:inline;">
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
        {{ $charges->links() }}
    </div>
@stop
