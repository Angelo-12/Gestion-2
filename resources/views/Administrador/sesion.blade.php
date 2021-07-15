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
                                            <div class="col-md-10 offset-md-2">
                                            <h4 class="title">Buscar Tallerista</h4> <br>
                                            <select id="select" class="form-control">
                                                <option></option>
                                                @foreach ($data as $dat)
                                                    <option value="{{$dat->id}}">{{$dat->nombre_tallerista}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <table class="table table-hover" id="tabla">
                                                <thead class=" text-primary">
                                                    <tr>
                                                        <th>Pregunta</th>
                                                        <th>En Desacuerdo</th>
                                                        <th>Poco de a cuerdo</th>
                                                        <th>Le da Igual</th>
                                                        <th>De Acuerdo</th>    
                                                        <th>Muy de Acuerdo</th> 
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12" style="min-height:400px">
                                                <canvas id="myChart"></canvas>
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
@endsection


@push('js')
    <script type="text/javascript">

    let tallerista_select = null;
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
            tallerista_select=value[0].id;
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
            "ajax": "/getDatosTallerista2/1",
            "autoWidth": false,
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

    let ctf = $('#myChart');
		let chart_tf = new Chart(ctf, {
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
				legend:{display:false}
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
        $.ajax({
            url:'/getDatosTallerista/'+tallerista_select,
            success: function (response) {
                $('#tabla').DataTable().clear().draw();
                $('#tabla').DataTable().rows.add(response);
                $('#tabla').DataTable().columns.adjust().draw();
            }
        });

        $.ajax({
            url:'/getDatosTallerista3/'+tallerista_select,
            success: function (response) {
                let res = JSON.parse(response);
                console.log(res);
                let arre = [];
                let cont = 0;
                res.data.forEach(element=>{
                    let set = {
                        label: element.pregunta,
                        backgroundColor: [colors[cont]],
                        data: element                        
                    }
                    arre.push(set);
                    cont++;
                    if(cont>colors.length-1) cont=0;
                });

                console.log(arre);
                

                chart_tf.data.datasets=arre;
                chart_tf.options.title.text='Reportes por tipo de fallas (Total: )';
                chart_tf.update();
            }
        });
    }
        
    </script>
@endpush
