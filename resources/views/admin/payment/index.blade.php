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
                                            <th>CP Num</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymentarray as $payment)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$payment['agent']}}</td>
                                            <td>{{$payment['cp_num']}}</td>
                                            <td>{{$payment['name']}}</td>
                                            <td>{{$payment['contact']}}</td>
                                            <td>{{$payment['amount']}}</td>
                                            <td><a href="{{ route('admindetailspayment', $payment['id']) }}"><span class="badge badge-primary">view</span>  | &nbsp 
                                                <a href="{{ route('admineditpayment', $payment['id']) }}"><span class="badge badge-success">edit</span>
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