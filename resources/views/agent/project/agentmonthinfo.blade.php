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
                                    <h2>{{$cases}}</h2>
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
                                    <h2>{{$processcomm}}</h2>
                                    <span>Process Comm</span>
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
                                    <h2>{{$successcomm}}</h2>
                                    <span>Success Comm</span>
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
                                            <th>Unit</th>
                                            <th>Comm</th>
                                            <th>SST</th>
                                            <th>Netcomm</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->date}}</td>
                                        <td>{{$data->unit}}</td>
                                        <td>{{$data->commperperson}}</td>
                                        <td>{{$data->sst}}</td>
                                        <td>{{$data->commpersondeductsst}}</td>
                                        @if($data->status == "success")
                                            <td align="center"><span class="badge badge-success">{{$data->status}}</span></td>
                                        @elseif($data->status == "process")
                                            <td align="center"><span class="badge badge-primary">{{$data->status}}</span></td>
                                        @elseif($data->status =="cancel")
                                            <td align="center"><span class="badge badge-danger">{{$data->status}}</span></td>
                                        @endif
                                        <td><a href="{{ route('agentdetailsproject', ['id'=>$data->id,'type'=>'month']) }}"><span class="badge badge-primary">view</span> </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
            </div>
                <div class="row">
                    <div class="col-sm-2">
                    <a href="{{ route('agentlistmonthproject') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>

@endsection