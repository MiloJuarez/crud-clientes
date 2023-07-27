@extends('app')
@section('pages')
    <div class="container-md">
        <h2>Clientes</h2>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary agregar" data-bs-toggle="modal"
                data-bs-target="#frmModal">Registrar</button>
        </div>
        <div>
            <table class="table table-hover table-inverse table-responsive text-white">
                <thead class="thead-inverse|thead-default">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Domicilio</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $count }}</td>
                            <td scope="row">{{ $cliente->nombre_completo }}</td>
                            <td>{{ $cliente->domicilio }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary editar" data-bs-toggle="modal"
                                    data-bs-target="#frmModal" data-identifier="{{ $cliente->id }}">Editar</button>
                                <button type="button" class="btn btn-danger btnEliminar" data-bs-toggle="modal"
                                    data-bs-target="#modelId" data-identifier="{{ $cliente->id }}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

            @if (count($clientes) == 0)
                <div class="d-flex justify-content-center text-white">
                    <p class="fs-4 fst-italic fw-light">No hat clientes registrados</p>
                </div>
            @endif

        </div>
    </div>
@endsection
@section('modals')
    @include('components.confirmDelete')
    @include('pages.cliente.frmModal')
@endsection
@section('scripts')
    <script src="{{ asset('/js/index.js') }}" type="module"></script>
@endsection
