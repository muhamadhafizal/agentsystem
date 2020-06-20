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
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Nickname</th>
                                            <th>Contact</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alluser as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->contact}}</td>
                                            <td>{{$data->level}}</td>
                                            <td><a href="{{ route('detailsagent', $data->id) }}"><span class="badge badge-primary">view</span>  | &nbsp <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('UserController@destroy', $data->id) }}"><span class="badge badge-danger">delete</span></a></td>
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
                            <a href=""><button type="button" class="btn btn-success">Export to excell</button></a>
                            </div>
                        </div>

@endsection