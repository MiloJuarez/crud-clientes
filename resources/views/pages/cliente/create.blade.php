@extends('app')
@section('pages')
    <div class="container-md">
        <h2>Nuevo cliente</h2>
        <div>
            <form method="post">
                @csrf
                @include('pages.cliente.form')
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" id="btnRegistrar">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
