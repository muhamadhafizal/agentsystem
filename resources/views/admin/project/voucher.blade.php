@extends('layouts.app')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ route('storevoucherproject') }}">
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title">Add Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Agent:</label>
            <select name="agent" class="form-control">  
            <option value=></option>
                @foreach($agent as $data)                       
                <option value="{{$data->id}}">{{$data->nickname}}</option>	
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date:</label>
            <input type="date" name="date" class="form-control" value="{{$currentdate}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Voucher Number:</label>
            <input type="text" name="vouchernumber" placeholder="MW/2020/XXXX" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <textarea name="address" class="form-control"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
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
                      
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Voucher</button>
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
                                            <th>Voucher Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->date}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->vouchernumber}}</td>
                                            <td>{{$data->address}}</td>
                                            <td><a href="{{ route('detailsprojectvoucher', $data->id) }}"><span class="badge badge-primary">view</span>  | &nbsp <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('ProjectController@destroyvoucher', $data->id) }}"><span class="badge badge-danger">delete</span></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        
                        

@endsection