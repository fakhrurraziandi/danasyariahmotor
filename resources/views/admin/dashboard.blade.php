
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    
                    
                    <!-- Pending Requests Card Example -->
                    {{-- <div class="col-xl-6 col-md-6 mb-4">
                        <a href="{{route('admin.pengajuan_kredit_motor.index')}}">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengajuan Kredit Motor</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\PengajuanKreditMotor::count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <a href="{{route('admin.pengajuan_pembiayaan_dana.index')}}">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengajuan Pembiayaan Dana Syariah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\PengajuanPembiayaanDana::count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                        <a href="{{route('admin.user.index')}}">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User Registrasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\User::count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row mb-4">
                

                    
               

                    <div class="col-sm-12">
                        <div id="chart_sumber_informasi"></div>

                        
                        {{-- {
                            name: 'Tokyo',
                            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                        },  --}}
                        
                        <script>
                            $(function(){
                                Highcharts.chart('chart_sumber_informasi', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Statistik Pengajuan Pembiayaan Dana Customer'
                                    },
                                    subtitle: {
                                        text: 'Berdasarkan Sumber Informasi'
                                    },
                                    xAxis: {
                                        categories: [
                                            'Jan',
                                            'Feb',
                                            'Mar',
                                            'Apr',
                                            'May',
                                            'Jun',
                                            'Jul',
                                            'Aug',
                                            'Sep',
                                            'Oct',
                                            'Nov',
                                            'Dec'
                                        ],
                                        crosshair: true
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Jumlah Customer'
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                            '<td style="padding:0"><b>{point.y} </b></td></tr>',
                                        footerFormat: '</table>',
                                        shared: true,
                                        useHTML: true
                                    },
                                    plotOptions: {
                                        column: {
                                            pointPadding: 0.2,
                                            borderWidth: 0
                                        }
                                    },
                                    series: JSON.parse('<?php echo $json_list_sumber_informasi ?>')
                                });
                            });
                        </script>
                    </div>
                </div>

            12  
            </div>
        </div>
    </div>
@endsection