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
                            <a href="{{ route('addproject') }}"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
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
                                            <td><a href="{{ action('ProjectController@details', ['id' => $data['id'], 'type' => 'main']) }}"><span class="badge badge-primary">view</span>  | &nbsp <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('ProjectController@destroy', ['id' => $data['id'], 'type' => 'main']) }}"><span class="badge badge-danger">delete</span></a></td>
                                        </tr>
                                    @endforeach
                                      
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

@endsection