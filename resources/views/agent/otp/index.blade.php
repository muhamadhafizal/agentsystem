@extends('layouts.appagents')

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
                        <a href="{{ route('addotp') }}"><button type="button" class="btn btn-primary">Add OTP</button></a>
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
                                            <th>OTP Num</th>
                                            <th>Date Offer</th>
                                            <th>Sales Property</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$purchase->otp_num}}</td>
                                            <td>{{$purchase->date_offer}}</td>
                                            <td>{{$purchase->sales_property}}</td>
                                            <td><a href="{{ route('detailsotp', $purchase->id) }}"><span class="badge badge-primary">view</span>  | &nbsp 
                                                <a href="{{ route('editotp', $purchase->id) }}"><span class="badge badge-success">edit</span> 
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