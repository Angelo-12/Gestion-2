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
                                            <div class="col-12">
                                                <h4 class="title">Buscar Tallerista</h4>
                                            </div>
                                                
                                            <div class="col-xs-12 col-md-6">
                                                <select id="select" class="form-control">
                                                    <option></option>
                                                    @foreach ($data as $dat)
                                                        <option value="{{$dat->id}}">{{$dat->nombre_tallerista}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-md-6">
                                                <select id="select2" class="form-control">
                                                    <option></option>
                                                    @foreach ($sesiones as $ses)
                                                        <option value="{{$ses->sesion}}">{{$ses->sesion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>                                            
                                        </div>

                                        <div class="row hide">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="tabla">
                                                        <thead class=" text-primary">
                                                            <tr>
                                                                <th>Pregunta</th>
                                                                <th>Muy Desacuerdo</th>
                                                                <th>Desacuerdo</th>
                                                                <th>Le da Igual</th>
                                                                <th>De Acuerdo</th>    
                                                                <th>Muy de Acuerdo</th> 
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="row hide">
                                            <div class="col-xs-12 col-md-6">
                                                <canvas id="preg_1"></canvas>
                                            </div>  
                                            
                                            <div class="col-xs-12 col-md-6">
                                                <canvas id="preg_2"></canvas>
                                            </div> 
                                        </div>

                                        <div class="row hide">
                                            <div class="col-xs-12 col-md-6">
                                                <canvas id="preg_3"></canvas>
                                            </div>  
                                            
                                            <div class="col-xs-12 col-md-6">
                                                <canvas id="preg_4"></canvas>
                                            </div> 
                                        </div>

                                        <div class="row hide">
                                            <div class="col-xs-12 col-md-6 ml-auto mr-auto">
                                                <canvas id="preg_5"></canvas>
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
    <script src="{{ asset('js') }}/datatables.js"></script>
    <script src="{{ asset('chart') }}/dist/chart.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
@endsection


@push('js')
    <script type="text/javascript">

    let tallerista_select = null;
    let sesion_select = null;

    let colors = [
        'rgb(255, 167, 38, 0.7)',
        'rgb(102, 187, 106, 0.7)',
        'rgb(41, 182, 246, 0.7)',
        'rgb(236, 64, 122, 0.7)',
        'rgb(204, 112, 197, 0.7)'
    ];

    $(document).ready(function() {
        $('#select').select2({
            placeholder: 'Seleccione un Tallerista'
        }).on('select2:select', function () {       
            var value = $("#select").select2('data');
            var value2 = $("#select2").select2('data');

            tallerista_select = value[0].id;
            sesion_select = value2[0].id;
            filtrar();

            let nodes = document.querySelectorAll('.hide');
            nodes.forEach(element=>{
                element.classList.remove('hide');
            });
        });

        $('#select2').select2({
            placeholder: 'Seleccione una Sesion'
        }).on('select2:select', function () {       
            var value = $("#select").select2('data');
            var value2 = $("#select2").select2('data');

            tallerista_select = value[0].id;
            sesion_select = value2[0].id;
            filtrar();
        });

        $('#tabla').DataTable({
            "lengthChange": false,
            "pageLength": 20,
            "aaSorting": [],
            "bFilter": false ,
            "paging":   false,
            "ordering": false,
            "info":     false,
            "autoWidth": false,
            "dom": 'Bfrtip',
            "buttons": [
                'excel'
            ],
            "columns": [
                {"data": "pregunta"},
                {"data": "res_1"}, 
                {"data": "res_2"},
                {"data": "res_3"},
                {"data": "res_4"},
                {"data": "res_5"}
            ],
            language:{

                sSearch: "",
                sZeroRecords: "Sin Registros",
                sInfoEmpty: " ",
                sInfoFiltered: "",
                sInfo: "Resultados del _START_ al _END_  Total: _TOTAL_",
                sEmptyTable: "Sin Registros",
                
            },
        });

        
    });

    let p_1 = $('#preg_1');
    let preg_1 = new Chart(p_1, {
        type: 'bar',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {beginAtZero:true}
                }]
            }
        }
    });

    let p_2 = $('#preg_2');
    let preg_2 = new Chart(p_2, {
        type: 'bar',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {beginAtZero:true}
                }]
            },
            title: {
                display: true,
                text: 'Reportes por tipo de falla'
            },
            legend:{display:true}
        }
    });


    let p_3 = $('#preg_3');
    let preg_3 = new Chart(p_3, {
        type: 'bar',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {beginAtZero:true}
                }]
            }
        }
    });

    let p_4 = $('#preg_4');
    let preg_4 = new Chart(p_4, {
        type: 'bar',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {beginAtZero:true}
                }]
            }
        }
    });

    let p_5 = $('#preg_5');
    let preg_5 = new Chart(p_5, {
        type: 'bar',
        data: {
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {beginAtZero:true}
                }]
            }
        }
    });

    function getColors(){
        return shuffleArray(colors);
    }

    

    function shuffleArray(arr){
        for(var i =arr.length-1 ; i>0 ;i--){
            var j = Math.floor( Math.random() * (i + 1) ); //random index
            [arr[i],arr[j]]=[arr[j],arr[i]]; // swap
        }
        return arr;
    }


    function filtrar(){
        if(tallerista_select=='') tallerista_select=0;
        if(sesion_select=='') sesion_select=0;
        $.ajax({
            url:'/getDatosTallerista/'+tallerista_select+'/'+sesion_select,
            success: function (response) {
                $('#tabla').DataTable().clear().draw();
                $('#tabla').DataTable().rows.add(response);
                $('#tabla').DataTable().columns.adjust().draw();
            }
        });

        $.ajax({
            url:'/getDatosTallerista3/'+tallerista_select+'/'+sesion_select,
            success: function (response) {
                let res = JSON.parse(response);

                let label1 = res.data[0].pregunta;
                let label2 = res.data[1].pregunta;
                let label3 = res.data[2].pregunta;
                let label4 = res.data[3].pregunta;
                let label5 = res.data[4].pregunta;
                
                delete res.data[0].pregunta;
                delete res.data[1].pregunta;
                delete res.data[2].pregunta;
                delete res.data[3].pregunta;
                delete res.data[4].pregunta;

                let set1 = {
                    label: label1,
                    backgroundColor: colors,
                    data: res.data[0]                       
                }

                preg_1.data.datasets[0]=set1;
                preg_1.update();

                let set2 = {
                    label: label2,
                    backgroundColor: colors,
                    data: res.data[1]                       
                }

                preg_2.data.datasets[0]=set2;
                preg_2.update();


                let set3 = {
                    label: label3,
                    backgroundColor: colors,
                    data: res.data[2]                       
                }

                preg_3.data.datasets[0]=set3;
                preg_3.update();


                let set4 = {
                    label: label4,
                    backgroundColor: colors,
                    data: res.data[3]                       
                }

                preg_4.data.datasets[0]=set4;
                preg_4.update();


                let set5 = {
                    label: label5,
                    backgroundColor: colors,
                    data: res.data[4]                       
                }

                preg_5.data.datasets[0]=set5;
                preg_5.update();
            }
        });
    }
        
    </script>
@endpush
