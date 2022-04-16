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
                                            <th>OTL Num</th>
                                            <th>Date Of Agreement</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($offers as $offer)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$offer->otl_no}}</td>
                                                <td>{{$offer->date_of_agreement}}</td>
                                                <td>{{$offer->property_address}}</td>
                                                <td><a href="{{ route('admindetailsotl', $offer->id) }}"><span class="badge badge-primary">view</span>  | &nbsp 
                                                    <a href="{{ route('admineditotl', $offer->id) }}"><span class="badge badge-success">edit</span> 
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