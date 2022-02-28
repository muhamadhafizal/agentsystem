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
                    <a href="{{ route('listvoucher') }}"><button class="btn btn-primary"> back</button></a>
                    </div>
                    </div>
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Payment Voucher</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('updatevoucher') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">VOUCHER NO</label>
                                                <input type="text" name="vouchernum" value="{{$details->vouchernum}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">DATE</label>
                                                <input type="date" name="date" value="{{$details->date}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">ADDRESS</label>
                                                <input type="text" name="address" value="{{$details->address}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">PAY TO</label>
                                                <input type="text" name="pay_to" value="{{$details->pay_to}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">NRIC</label>
                                                <input type="text" name="nric" value="{{$details->nric}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">BANK DETAILS</label>
                                                <input type="text" name="bank_details" value="{{$details->bank_details}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc1" value="{{$descriptionarray[0]->description}}" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount1" step="0.001" value="{{$descriptionarray[0]->amount}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc2" value="{{$descriptionarray[1]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount2" step="0.001" value="{{$descriptionarray[1]->amount}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc3"  value="{{$descriptionarray[2]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount3" value="{{$descriptionarray[2]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc4" value="{{$descriptionarray[3]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount4" value="{{$descriptionarray[3]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc5" value="{{$descriptionarray[4]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount5" value="{{$descriptionarray[4]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc6" value="{{$descriptionarray[5]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount6" value="{{$descriptionarray[5]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc7" value="{{$descriptionarray[6]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount7" value="{{$descriptionarray[6]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc8" value="{{$descriptionarray[7]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount8" value="{{$descriptionarray[7]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc9" value="{{$descriptionarray[8]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount9" value="{{$descriptionarray[8]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc10" value="{{$descriptionarray[9]->description}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount10"  value="{{$descriptionarray[9]->amount}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="voucher_id" value="{{$details->id}}">
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