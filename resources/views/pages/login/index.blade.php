@extends('app')
@section('pages')
    <div class="container login-container">
        <form method="post" class="login-form shadow-lg mb-5 bg-light bg-gradient rounded border boder-light">
            <div class="d-flex justify-content-center bg-dark text-white">
                <h2 class="fs-4">Iniciar sesión</h2>
            </div>
            <div class="p-3">
                <div id="l-messages">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Usuario</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="********"
                        required>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" id="login">Inciar sesión</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/login.js') }}" type="module"></script>
@endsection
