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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
