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
	                <div class="col-lg-8">
                    <div class="row">
                    <div class="col-md-6 text-left mb-3">
                    <a href="{{ route('listreceiptbillion') }}"><button class="btn btn-primary"> back</button></a>
                    </div>
                    </div>
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Receipt Billion</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('storereceiptbillion') }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">RECEIPT NO</label>
                                            <input type="text" name="receiptnum" placeholder="MW/2022/XXXX" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">DATE</label>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">PAYMENT METHOD</label>
                                            <input type="text" name="payment_method" placeholder="Enter PAYMENT METHOD" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">RECEIVED FROM</label>
                                            <input type="text" name="received_from" placeholder="Enter RECEIVED FROM" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">AMOUNT PAID</label>
                                            <input type="text" name="amount_paid" placeholder="Enter AMOUNT PAID" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">BEING PAYMENT OF</label>
                                            <input type="text" name="being_payment" placeholder="Enter BEING PAYMENT OF" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">ADDRESS</label>
                                            <input type="text" name="address" placeholder="Enter ADDRESS" class="form-control" required>
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
	                        </form>
	                        </div>
	                    </div>
	                </div>
                    <div class="col-lg-2">
                    </div>
	             </div>


@endsection