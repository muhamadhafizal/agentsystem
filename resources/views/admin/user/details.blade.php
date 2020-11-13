@extends('layouts.app')

@section('content')
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form class="form-horizontal" method="POST" action="{{ route('updategop', $userarray['id']) }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update GOP</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">GOP</label>
                            <select name="gopid" id="gopid" class="form-control">
                                @foreach($leaduser as $data)
                                <option value="{{$data->id}}">{{$data->nickname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to update GOP?')" >Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
            <div class="row">
	        	    <div class="col-sm-12">
                        @if(Session::has('flash_message'))
                         <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
	        	        @endif
                        @if(Session::has('flash_message_delete'))
                         <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
                        @endif
	        	    </div>
	        	</div>
            <div class="row">
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Details</strong>
	                            <small>Agent</small>
                                <small>|</small>
                                <a href="{{ action('UserController@downline', $userarray['id']) }}"><small>downLine</small></a>
                                
	                        </div>
	                        <div class="card-body card-block">
	                        	<form>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Full Name</label>
                                            <input type="text" name="fullname" value="{{$userarray['fullname']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Nickname</label>
                                            <input type="text" name="nickname" value="{{$userarray['nickname']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">IC</label>
	                                        <input type="text" name="ic" value="{{$userarray['ic']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Contact</label>
	                                        <input type="text" name="contact" value="{{$userarray['contact']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Email Address</label>
	                                    <input type="email" name="email" value="{{$userarray['email']}}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Bank Name</label>
                                            <input type="text" name="bankname" value="{{$userarray['bankname']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Bank Account Number</label>
                                            <input type="number" name="bankaccnumber" value="{{$userarray['bankaccnumber']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Position</label>
                                            <input type="text" name="position" value="{{$userarray['position']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Lead</label>
                                            <input type="text" name="lead" value="{{$userarray['leadname']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Pre Lead</label>
                                            <input type="text" name="prelead" value="{{$userarray['preleadname']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Introducer Program</label>
                                            <input type="text" name="ip" value="{{$userarray['ipname']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">GOP 1</label>
                                            <input type="text" name="gopone" value="{{$userarray['goponename']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">GOP 2</label>
                                            <input type="text" name="goptwo" value="{{$userarray['goptwoname']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="postal-code" class=" form-control-label">Username</label>
	                                        <input type="text" name="username" value="{{$userarray['username']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="country" class=" form-control-label">Password</label>
	                                    <input type="text" name="password" value="{{$userarray['password']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="postal-code" class=" form-control-label">Status</label>
	                                        <input type="text" value="{{$userarray['status']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="country" class=" form-control-label">Personal Profit</label>
	                                    <input type="text" value="{{$userarray['totalcommpersonal']}}" class="form-control" disabled>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label for="country" class=" form-control-label">Group Profit</label>
	                                    <input type="text" value="{{$userarray['totalcommgroup']}}" class="form-control" disabled>
                                        </div>
                                    </div>
	                            </div>
                                    <div class="row">
                                        <div>
                                        &nbsp&nbsp&nbsp<button type="button" class="btn btn-primary" onclick="window.location='{{ route('allagents') }}'"><i class="fa fa-arrow-left"></i></button>&nbsp<button type="button" class="btn btn-primary" onclick="window.location='{{ action('UserController@edit', $userarray['id']) }}'">Edit Info</button>&nbsp @if($userarray['position'] == 'lead' )<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">update gop</button>@endif
                                        </div>
                                    </div>
                                    
	                        </form>
	                        </div>
	                    </div>
	                </div>
	             </div>
@endsection