@extends('layouts.appagents')

@section('content')
            <!-- MAIN CONTENT-->
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
                                            <th>Num</th>
                                            <th>Address</th>
                                            <th>Agent</th>
                                            <th>Comm</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($finalarray as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data['date']}}</td>
                                        <td>{{$data['num']}}</td>
                                        <td>{{$data['address']}}</td>
                                        <td>{{$data['nickname']}}</td>
                                        <td>{{$data['commagent']}}</td>
                                        @if($data['status'] == "success")
                                            <td align="center"><span class="badge badge-success">{{$data['status']}}</span></td>
                                        @elseif($data['status'] == "process")
                                            <td align="center"><span class="badge badge-primary">{{$data['status']}}</span></td>
                                        @elseif($data['status'] =="cancel")
                                            <td align="center"><span class="badge badge-danger">{{$data['status']}}</span></td>
                                        @endif
                                        <td><a href="{{ route('agentdetailsrental', ['id'=>$data['id'],'type'=>'main']) }}"><span class="badge badge-primary">view</span> </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

@endsection