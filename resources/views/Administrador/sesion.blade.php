@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center principal">
            <div class="col-md-12">
                <div class="card" tabindex="-1">
                    <div class="card-header">DASHBOARD ADMINISTRADOR</div>
                        <div class="card-body">
                            <div class="container">
                                <section class="content" tabindex="-1">
                                    <div class="container-fluid">
                                        
                                        <div class="row" >
                                            <div class="col-md-8 offset-md-2">
                                            <h4 class="title">Buscar Tallerista</h4> <br>
                                            <select id="select" class="form-control">
                                                <option></option>
                                                @foreach ($data as $dat)
                                                    <option value="{{$dat->id}}">{{$dat->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            
                                <br>
                                
                                
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('select2/select2') }}/dist/js/select2.js"></script>
@endsection


@push('js')
    <script type="text/javascript">

    

    $(document).ready(function() {
        $('#select').select2({
            placeholder: 'Seleccione un Tallerista'
        });
    });


 
        
    </script>
@endpush
