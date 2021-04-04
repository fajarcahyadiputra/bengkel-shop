@extends('admin.layout')
@section('title', 'Home Page')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card">
            <div class="card-header" style="background-color: mintcream">
                <h3 class="text-dark">DASHBOARD</h3>
            </div>
            <div class="card-body">

                <div class="container-fluid">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Barang :</span>
                                        <span>{{ $jumblahBarang }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Pengguna :</span>
                                        <span>{{ $jumblahUser }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Transaksi :</span>
                                        <span>{{ $jumblahTransaksi }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Grafik Barang Masuk </div>
                                    <canvas id="myChart" width="50" height="20"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Grafik Barang Keluar</div>
                                    <canvas id="myChart2" width="50" height="20"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@stop

@section('javascript')
    <script>
        var ctx = document.getElementById('myChart');
        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
@stop
