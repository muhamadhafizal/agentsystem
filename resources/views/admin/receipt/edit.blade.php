@extends('layouts.app')

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
	                <div class="col-lg-8">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Receipt</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('updatereceipt') }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">RECEIPT NO</label>
                                            <input type="text" name="receiptnum" value="{{$receipt->receiptnum}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">DATE</label>
                                            <input type="date" name="date" value="{{$receipt->date}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">PAYMENT METHOD</label>
                                            <input type="text" name="payment_method" value="{{$receipt->payment_method}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">RECEIVED FROM</label>
                                            <input type="text" name="received_from" value="{{$receipt->received_from}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">AMOUNT PAID</label>
                                            <input type="text" name="amount_paid" value="{{$receipt->amount_paid}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">BEING PAYMENT OF</label>
                                            <input type="text" name="being_payment" value="{{$receipt->being_payment}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">ADDRESS</label>
                                            <input type="text" name="address" value="{{$receipt->address}}" class="form-control" required>
                                        </div>
                                    </div>
	                            </div>
                                <input type="hidden" name="receipt_id" value="{{$receipt->id}}">
	                            <div class="form-group">
                                <div class="row">
	                                <div class="col-md-6 col-md-offset-4">
	                                    <button type="submit" class="btn btn-primary">
	                                        Update
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