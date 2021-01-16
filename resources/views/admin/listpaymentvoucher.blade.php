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
                                            <th width="10">No</th>
                                            <th>Agent Name</th>
                                            <th width="40">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($finalarray as $data)
                                        <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data['nickname']}}</td>
                                        <td><a href="{{ route('paymentvoucherrentaldetails', ['id' => $data['id'],'caseid' => $id,'listid'=> $i]) }}"><span class="badge badge-primary">Voucher</span> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                                <div class="row">
                                    <div class="col-sm-2">
                                        @if($type == 'main')
                                        <a href="{{ route('detailsrental', $id) }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                                        @else
                                        <a href="{{ route('detailsrentalmonth', $id) }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                                        @endif
                                    </div>
                                    <div class="col-sm-10">
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection