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
                                                    <input type="number" class="form-control form-control-lg" placeholder="Ingresa el id">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-lg btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
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
                                      <h3 class="card-title">Empleado</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                      <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                          <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Reason</th>
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
                                          <div class="col-6">
                                            <h3 class="card-title">Agregado</h3>
                                          </div>

                                          <div class="col-6">
                                            <button ><i class="fas fa-file-pdf">Descargar</i></button>
                                          </div>
                                        </div>
                                    </div>
                                      <!-- /.card-header -->
                                      <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                          <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Nombre</th>
                                              <th>Date</th>
                                              <th>Status</th>
                                              <th>Reason</th>
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
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
