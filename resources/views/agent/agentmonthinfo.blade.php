@extends('layouts.appagents')

@section('content')

<!-- MAIN CONTENT-->
	<div class="row">
	        <H2 align="center" style="width: 12pc; color:white" >{{$monthname}}</H2>
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
                                    <h2>12</h2>
                                    <span>Total</span>
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
                                    <h2>123</h2>
                                    <span>Process</span>
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
                                    <h2>123</h2>
                                    <span>Success</span>
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
                                            <th>Num</th>
                                            <th>Category</th>
                                            <th>Area</th>
                                            <th>Agent</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($rental as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->date}}</td>
                                        <td>{{$data->num}}</td>
                                        @if($data->category == '1')
                                            <td>Rental</td>
                                        @elseif($data->category == '2')
                                            <td>Subsale</td>
                                        @endif
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->nickname}}</td>
                                        @if($data->status == "success")
                                            <td align="center"><span class="badge badge-success">{{$data->status}}</span></td>
                                        @elseif($data->status == "process")
                                            <td align="center"><span class="badge badge-primary">{{$data->status}}</span></td>
                                        @elseif($data->status =="cancel")
                                            <td align="center"><span class="badge badge-danger">{{$data->status}}</span></td>
                                        @endif
                                        <td><a href="{{ route('agentdetailsrental', ['id' => $data->id, 'type' => 'month']) }}"><span class="badge badge-primary">view</span> </td>
                                    </tr>
        
                                    @endforeach    

                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
            </div>
                <div class="row">
                    <div class="col-sm-2">
                    <a href="{{ route('agentlistmonth') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                        <a href=""><button type="button" class="btn btn-success">Export to excell</button></a>
                    </div>
                </div>

@endsection