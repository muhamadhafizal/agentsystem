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
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Date</th>
                                            <th>Num</th>
                                            <th>Category</th>
                                            <th>Area</th>
                                            <th>Agent</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rental as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->date}}</td>
                                        <td>{{$data->num}}</td>
                                        <td>{{$data->category}}</td>
                                        <td>{{$data->area}}</td>
                                        <td>{{$data->agent}}</td>
                                        <td>view</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

@endsection