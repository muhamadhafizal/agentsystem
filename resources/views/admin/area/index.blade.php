@extends('layouts.app')

@section('content')
            <!-- MAIN CONTENT-->
                 <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form-horizontal" method="POST" action="{{ route('addarea') }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Area</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Add Area</label>
                            <input class="form-control" type="text" name="area" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->
         <!-- Modal -->
         <div class="modal fade" id="exampleModalone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form-horizontal" method="POST" action="{{ route('updatearea') }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Area</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Update Area</label>
                            <input class="form-control" id="areaname" type="text" name="areaname">
                            <input type="hidden" id="areaid" name="areaid">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->
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
                            <a><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-plus"></i></button></a>
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
                                            <th>Area</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableId">
                                    @foreach($area as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->name}}</td>
                                        <td><a><button class="detailBtn" data-id="{{$data->id}}" data-name="{{$data->name}}" type="button" data-toggle="modal" data-target="#exampleModalone" data-whatever="@mdo"><span class="badge badge-primary">edit</span></button></a> | <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('AreaController@destroy', $data->id) }}"><span class="badge badge-danger">delete</span></a></td>
                                    </tr>
                                    @endforeach
                                   
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
   

@endsection
