@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
            <div class="row">
                    <div>
	            		@if(Session::has('flash_message'))
                            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                        @endif
	            	</div>
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Agent</small>
	                        </div>
	                        <div class="card-body card-block">
                            <form class="form-horizontal" method="POST" action="{{ route('updateagent', $userarray['id']) }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Full Name</label>
                                            <input type="text" name="fullname" value="{{$userarray['fullname']}}" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Nickname</label>
                                            <input type="text" name="nickname" value="{{$userarray['nickname']}}" class="form-control">
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">IC</label>
	                                        <input type="text" name="ic" value="{{$userarray['ic']}}" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Contact</label>
	                                        <input type="text" name="contact" value="{{$userarray['contact']}}" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Email Address</label>
	                                    <input type="email" name="email" value="{{$userarray['email']}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Bank Name</label>
                                            <input type="text" name="bankname" value="{{$userarray['bankname']}}" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Bank Account Number</label>
                                            <input type="text" name="bankaccnumber" value="{{$userarray['bankaccnumber']}}" class="form-control">
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Position</label>
                                            <select name="position" id="position" class="form-control">
                                                <option value="{{$userarray['position']}}">{{$userarray['position']}}</option>
                                                <option value="fullcomm">fullcomm</option>
                                                <option value="lead">Lead</option>
                                                <option value="prelead">PreLead</option>
                                                <option value="consultant">Consultant</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Lead</label>
                                            <select name="lead" class="form-control">
			                                	<option value="{{$userarray['leadid']}}">{{$userarray['leadname']}}</option>
			                                	@foreach($alluser as $data)
			                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
												@endforeach
                                                <option value=""></option>
		                                	</select>
                                            
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Pre Lead</label>
                                            <select name="prelead" class="form-control">
			                                	<option value="{{$userarray['preleadid']}}">{{$userarray['preleadname']}}</option>
			                                	@foreach($alluser as $data)
			                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
												@endforeach
                                                <option value=""></option>
		                                	</select>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Introducer Program</label>
                                            <select name="ip" class="form-control">
			                                	<option value="{{$userarray['ipid']}}">{{$userarray['ipname']}}</option>
			                                	@foreach($alluser as $data)
			                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
												@endforeach
                                                <option value=""></option>
		                                	</select>
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
	                                        <input type="text" name="username" value="{{$userarray['username']}}" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="country" class=" form-control-label">Password</label>
	                                    <input type="text" name="password" value="{{$userarray['password']}}" class="form-control">
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
	                                        Submit
	                                    </button>
	                                </div>
	                            </div>
	                        </form>
	                        </div>
	                    </div>
	                </div>
	             </div>
@endsection