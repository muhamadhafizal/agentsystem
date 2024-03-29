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
                    <div class="row">
                    <div class="col-md-6 text-left mb-3">
                    <a href="{{ route('listinvoice') }}"><button class="btn btn-primary"> back</button></a>
                    </div>
                    </div>
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Invoice</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('updateinvoice') }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">BILL TO</label>
                                            <input type="text" name="bill_to" value="{{$invoice->bill_to}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">DATE</label>
                                            <input type="date" name="date" value="{{$invoice->date}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">INVOICE NO</label>
                                            <input type="text" name="invoicenum" value="{{$invoice->invoicenum}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">2 MONTHS SECURITY DEPOSIT</label>
                                            <input type="number" name="two_month_security" step="0.001" value="{{$invoice->two_month_security}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">1/2 MONTHS UTILITY DEPOSIT</label>
                                            <input type="number" name="half_month_utility" step="0.001" value="{{$invoice->half_month_utility}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">1 MONTHS ADVANCE RENTAL</label>
                                            <input type="number" name="one_month_advance" step="0.001" value="{{$invoice->one_month_advance}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">1/2 MONTHS AGENT FEE</label>
                                            <input type="number" name="half_month_agent" step="0.001" value="{{$invoice->half_month_agent}}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class=" form-control-label">AGREEMENT AND STAMPING</label>
                                            <input type="number" name="agreement_stamping" step="0.001" value="{{$invoice->agreement_stemping}}" class="form-control" required>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <label class=" form-control-label">SST % (IF ANY)</label>
                                            <div class="row">
                                                <div class="col-4">
                                                <input type="number" name="sst" class="form-control" value="{{$invoice->sst}}">
                                                </div>
                                                <div class="col-6-text-right">
                                                %
                                                </div>
                                            </div>
                                        </div>
                                    </div>
	                            </div>
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
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