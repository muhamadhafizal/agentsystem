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
                        <div style="left: 290px;" class="col-sm-4">
                            <a href="{{ route('addagent') }}"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
                        </div>
                </div>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead style="background-color: #fffafa;f1a1a;">
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Nickname</th>
                                            <th>Contact</th>
                                            <th>IC</th>
                                            <th>Bank Name</th>
                                            <th>Bank Acc</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userarray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data['nickname']}}</td>
                                            <td>{{$data['contact']}}</td>
                                            <td>{{$data['ic']}}</td>
                                            <td>{{$data['bankname']}}</td>
                                            <td>{{$data['bankaccnumber']}}</td>
                                            <td>{{$data['level']}}</td>
                                            @if($data['status'] == "active")
                                                <td align="center"><span class="badge badge-success">{{$data['status']}}</span></td>
                                            @elseif($data['status'] == "resign")
                                                <td align="center"><span class="badge badge-danger">{{$data['status']}}</span></td>
                                            @endif
                                            <td><a href="{{ route('detailsagent', $data['id']) }}"><span class="badge badge-primary">view</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                            </div>
                            <div class="col-sm-2">
                            <a href="{{ route('agentexcell') }}"><button type="button" class="btn btn-success">Export to excell</button></a>
                            </div>
                        </div>

@endsection