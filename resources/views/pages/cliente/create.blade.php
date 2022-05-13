@extends('app')
@section('pages')
    <div class="container-md">
        <h2 class="text-white">Nuevo cliente</h2>
        <div>
            <div class="mt-4" id="messages">
            </div>
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
@section('scripts')
    <script src="{{ asset('/js/scripts.js') }}" type="module"></script>
@endsection
