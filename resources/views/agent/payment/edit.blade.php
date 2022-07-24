@extends('layouts.appagents')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	        	<div class="row">
	        	    <div class="col-sm-12">
	        	        @if(Session::has('flash_message'))
	        	            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
	        	        @endif
	        	    </div>
	        	</div>
	            <div class="row">

                <div class="col-lg-2">
                </div>
                <div class="col-md-6 text-left mb-3">
                <a href="{{ route('agentlistpayment') }}"><button class="btn btn-primary"> back</button></a>
                </div>
                <div class="col-md-4 text-right mb-3">
                </div>

                <div class="col-lg-2">
                </div>
	                <div class="col-lg-8">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Confirmation On Payment</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('updatepayment') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Name</label>
                                                <input type="text" name="name" value="{{$payment->name}}"  class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner NRIC</label>
                                                <input type="text" name="nric" value="{{$payment->ic}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Email</label>
                                                <input type="email" name="email" value="{{$payment->email}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Contact</label>
                                                <input type="text" name="contact" value="{{$payment->contact}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Tenant / Owner Address </label>
                                                <textarea class="form-control" name="address" cols="2" rows="2">{{$payment->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount" value="{{$payment->amount}}" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                
                                   <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update
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