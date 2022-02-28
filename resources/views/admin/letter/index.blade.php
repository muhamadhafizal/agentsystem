@extends('layouts.app')

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
                                            <th>Agent</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($letterarray as $letter)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$letter['agent']}}</td>
                                            <td>{{$letter['name']}}</td>
                                            <td>{{$letter['contact']}}</td>
                                            <td>{{$letter['date']}}</td>
                                            <td><a href="{{ route('admindetailsletter', $letter['id']) }}"><span class="badge badge-primary">view</span>  | &nbsp 
                                                <a href="{{ route('admineditletter', $letter['id']) }}"><span class="badge badge-success">edit</span>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        

@endsection