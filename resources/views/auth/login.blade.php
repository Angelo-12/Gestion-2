
@extends('layouts.app')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">


@section('content')
<div class="card p-5 card1 container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4 first">
                    </div>
                    <div class="col-md-6 second pl-4 pr-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <h4 class="welcome text-primary">Bienvenido</h4>
                            <div class="form-group"> 
                                <input id="email" type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password" type="password" name="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if (Route::has('password.request'))
                                    <div class="forgot">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    </div>
                                   
                                @endif
                               
                            </div>
                            <div class="space"> 
                                <button type="submit" class="btn btn-primary btn1">Login</button>
                            </div>
                        
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

