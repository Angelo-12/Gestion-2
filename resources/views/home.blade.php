@extends('layouts.app')

<style>
  .btn-circle.btn-xl {
        background-image:url('img/lapiz.png');
        background-repeat:no-repeat;
        width: 200px;
        height: 200px;
        background-position:center;
        padding: 10px 16px;
        border-radius: 100px;
        font-size: 24px;
        line-height: 1.33;
    }

    .titulo-btn{
       
        background-position:center;
        padding: 10px 16px;
        font-size: 24px;
        line-height: 1.33;
    }


</style>
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
                                OPCION UNO
                            </div>

                            <div class="col-6 titulo-btn" >
                                OPCION DOS
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-list"></i>
                                    
                                </button>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-6 titulo-btn" >
                                OPCION TRES
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
