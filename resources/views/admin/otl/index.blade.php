@extends('layouts.app')

@section('content')
      <!-- MAIN CONTENT-->
      <div class="row">
                        <div class="col-sm-6">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                            @endif
                            @if(Session::has('flash_message_delete'))
                                <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
                            @endif
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <div style="left: 200px;" class="col-sm-4">
                        <a href="{{ route('adminaddotl') }}"><button type="button" class="btn btn-primary">Add OTL</button></a>
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
                                            <th>OTL Num</th>
                                            <th>Date Of Agreement</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($offersarray as $offer)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$offer['otl_no']}}</td>
                                                <td>{{$offer['date_of_agreement']}}</td>
                                                <td>{{$offer['property_address']}}</td>
                                                @if($offer['status'] == "success")
                                                <td align="center"><span class="badge badge-success">{{$offer['status']}}</span></td>
                                                @elseif($offer['status'] == "cancel")
                                                <td align="center"><span class="badge badge-danger">{{$offer['status']}}</span></td>
                                                @endif
                                                <td><a href="{{ route('admindetailsotl', $offer['id']) }}"><span class="badge badge-primary">view</span>  | &nbsp 
                                                    <a href="{{ route('admineditotl', $offer['id']) }}"><span class="badge badge-success">edit</span> 
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