@extends('layouts.app')

@section('content')

<!-- MAIN CONTENT-->
    <div class="row">
            <div class="col-sm-4">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                @if(Session::has('flash_message_delete'))
                    <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
                @endif
            </div>
            <div class="col-sm-4">

            </div>
    </div>
	<div class="row">
	        <H2 align="center" style="width: 20pc; color:white" >{{$monthname}}</H2>
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white"></h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totalcases}}</h2>
                                    <span>Cases</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totalnetselling}}</h2>
                                    <span>NetSelling</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totalnetcomm}}</h2>
                                    <span>NetComm</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totalpoolfundcomm}}</h2>
                                    <span>PoolFundComm</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totalcompanycomm}}</h2>
                                    <span>CompanyComm</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{$totaldiff}}</h2>
                                    <span>Tiering Differencial</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
            	<!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead style="background-color: #fffafa;f1a1a;">
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Date</th>
                                            <th>Agent</th>
                                            <th>Unit</th>
                                            <th>SpaPrice(RM)</th>
                                            <th>NetSelling(RM)</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($finalArray as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data['date']}}</td>
                                                <td>
                                                    @foreach($data['agent'] as $val)
                                                    <li>{{$val}}</li>
                                                    @endforeach
                                                </td>
                                                <td>{{$data['unit']}}</td>
                                                <td>{{$data['spaprice']}}</td>
                                                <td>{{$data['netselling']}}</td>
                                                @if($data['status'] == "success")
                                                <td><span class="badge badge-success">{{$data['status']}}</span></td>
                                                @elseif($data['status'] == "process")
                                                <td><span class="badge badge-primary">{{$data['status']}}</span></td>
                                                @elseif($data['status'] =="cancel")
                                                <td><span class="badge badge-danger">{{$data['status']}}</span></td>
                                                @endif
                                                <td><a href="{{ action('ProjectController@details', ['id' => $data['id'], 'type' => 'month']) }}"><span class="badge badge-primary">view</span>  | &nbsp <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('ProjectController@destroy', ['id' => $data['id'], 'type' => 'month']) }}"><span class="badge badge-danger">delete</span></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
            </div>
                <div class="row">
                    <div class="col-sm-2">
                    <a href="{{ route('listmonthproject') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                    <a href="{{ action('ExcelController@excelprojectmonth', [$month,$year]) }}"><button type="button" class="btn btn-success">Export to excell</button></a>
                    </div>
                </div>

@endsection