@extends('layouts.app')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">GESTION</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-6" >
                                <button type="button" class="btn btn-primary btn-circle btn-xl" ><i class="fa fa-list"></i>                                       
                                </button>
                                
                            </div>

                            <div class="col-6">
                                <button type="button" class="btn btn-secondary btn-circle btn-xl"><i class="fa fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-6 titulo-btn" >
                                ADMINISTRADOR
                            </div>

                            <div class="col-6 titulo-btn" >
                                MAESTRO
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>

                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-circle btn-xl" id="sesion_tallerista" onclick="SesionTallerista();"><i class="fa fa-list"></i>
                                    
                                </button>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-6 titulo-btn" >
                                TALLERISTA
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
