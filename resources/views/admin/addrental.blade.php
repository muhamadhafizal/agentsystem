@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	        	<div class="row">
	        	    <div class="col-sm-12">
	        	        @if(Session::has('flash_message_delete'))
	        	            <div class="alert alert-danger"><span class="fa fa-warning"></span><em> {!! session('flash_message_delete') !!}</em></div>
	        	        @endif
	        	    </div>
	        	</div>
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Rental</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class=" form-control-label">Full Name</label>
                                            <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label class=" form-control-label">Nickname</label>
                                            <input type="text" name="nickname" placeholder="Enter your nickname" class="form-control" required>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class=" form-control-label">IC</label>
	                                        <input type="text" name="ic" placeholder="xxxxxx-xx-xxxx" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label class=" form-control-label">Contact</label>
	                                        <input type="text" name="contact" placeholder="xxx-xxxxxxx" class="form-control" required>
                                        </div>
                                        <div class="col-4">
                                            <label class=" form-control-label">Email Address</label>
	                                    <input type="email" name="email" placeholder="Enter your email address" class="form-control" required>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="form-control-label">Position</label>
                                            <select name="position" id="position" class="form-control">
                                                <option value=""></option>
                                                <option value="lead">Lead</option>
                                                <option value="prelead">PreLead</option>
                                                <option value="consultant">Consultant</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-control-label">Lead</label>
                                            <select name="lead" id="lead" class="form-control">
                                                <option value=""></option>
                                                <option value="ALI">ALI</option>
                                                <option value="ABU">ABU</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-control-label">Pre Lead</label>
                                            <select name="prelead" id="prelead" class="form-control">
                                                <option value=""></option>
                                                <option value="ALI">ALI</option>
                                                <option value="ABU">ABU</option>
                                            </select>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="form-control-label">Introducer Program</label>
                                            <select name="ip" id="ip" class="form-control">
                                                <option value=""></option>
                                                <option value="ALI">ALI</option>
                                                <option value="ABU">ABU</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-control-label">GOP 1</label>
                                            <select name="gopone" id="gopone" class="form-control">
                                                <option value=""></option>
                                                <option value="ALI">ALI</option>
                                                <option value="ABU">ABU</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-control-label">GOP 2</label>
                                            <select name="goptwo" id="goptwo" class="form-control">
                                                <option value=""></option>
                                                <option value="ALI">ALI</option>
                                                <option value="ABU">ABU</option>
                                            </select>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="postal-code" class=" form-control-label">Username</label>
	                                        <input type="text" name="username" placeholder="Enter your username" class="form-control" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="country" class=" form-control-label">Password</label>
	                                    <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
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