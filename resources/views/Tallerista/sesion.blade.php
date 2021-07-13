@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center principal">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SESIÓN</div>
                    <div class="card-body">
                        <div class="container">
                            <section class="content">
                                <div class="container-fluid">
                                    <h5 class="text-center display-4">Buscar</h5>
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <form action="simple-results.html">
                                                <div class="input-group">
                                                    <input type="text" name="id_tallerista" class="form-control form-control-lg" placeholder="Ingresa el id">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-sm btn-default" id="buscar_tallerista">
                                                            <i class="fas fa-search"></i>
                                                        </button>

                                                        <input type="text" value="{{Auth::user()->id}}" hidden>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        
                            <br>
                            
                            <div class="row">
                                <div class="col-6">
                                  <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Tallerista</h3>
                                    </div>
                                     <div class="card-header">
                                      <button type="button" class="btn btn-md btn-primary" id="buscar_tallerista">
                                          PDF <i class="fas fa-file-pdf"></i>
                                      </button>
                                      <button type="button" class="btn btn-md btn-success" id="buscar_tallerista">
                                          EXCEL <i class="far fa-file-excel"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                      <table id="tabla_tallerista" class="table table-head-fixed text-nowrap">
                                        <thead>
                                          <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Lugar</th>
                                            <th>Opcion</th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                      </table>
                                    </div>

                                    <!-- /.card-body -->
                                  </div>
                                  <!-- /.card -->
                                </div>
                                <div class="col-6">
                                  <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Lista</h3>
                                    </div>

                                    <div class="card-header">
                                      <button type="button" class="btn btn-md btn-primary" id="buscar_tallerista">
                                          PDF <i class="fas fa-file-pdf"></i>
                                      </button>

                                      <button type="button" class="btn btn-md btn-success" id="buscar_tallerista">
                                          EXCEL <i class="far fa-file-excel"></i>
                                      </button>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                      <table id="tabla_lista" class="table table-head-fixed text-nowrap">
                                        <thead>
                                          <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Lugar</th>
                                            <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-header">
                                      <button type="button" class="btn btn-md btn-primary" id="buscar_tallerista">
                                          Guardar <i class="far fa-save"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <!-- /.card -->
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
