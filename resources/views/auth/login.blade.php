@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class ="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label>Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label>Senha</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Entrar
                            </button>
                            @if (Route::has('password.request'))
                                <div class="text-end">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueci minha senha
                                    </a>
                                </div>
                            @endif
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
