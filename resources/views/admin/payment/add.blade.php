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

                <div class="col-lg-2">
                </div>
                <div class="col-md-6 text-left mb-3">
                <a href="{{  route('adminlistpayment')}}"><button class="btn btn-primary"> back</button></a>
                </div>
                <div class="col-md-4 text-right mb-3">
                </div>
                
                <div class="col-lg-2">
                </div>
	                <div class="col-lg-8">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Confirmation On Payment</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('adminstorepayment') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Name</label>
                                                <input type="text" name="name"  class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner NRIC</label>
                                                <input type="text" name="nric" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Contact</label>
                                                <input type="text" name="contact" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Agent</label>
                                                <select name="agent" class="form-control">
                                                    <option value="0"></option>
                                                    @foreach($agents as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
	                    </div>
	                </div>
                    <div class="col-lg-2">
                    </div>
	             </div>


@endsection