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
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Payment Voucher</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('storevoucher') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">VOUCHER NO</label>
                                                <input type="text" name="vouchernum" placeholder="MW/2022/XXXX" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">DATE</label>
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">ADDRESS</label>
                                                <input type="text" name="address" placeholder="Enter ADDRESS" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">PAY TO</label>
                                                <input type="text" name="pay_to" placeholder="Enter PAY TO" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">NRIC</label>
                                                <input type="text" name="nric" placeholder="Enter NRIC" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">BANK DETAILS</label>
                                                <input type="text" name="bank_details" placeholder="Enter BANK DETAILS" class="form-control" required>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc1" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount1" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc2" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount2" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc3" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount3" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc4" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount4" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc5" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount5" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc6" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount6" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc7" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount7" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc8" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount8" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc9" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount9" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Description</label>
                                                <input type="text" name="desc10" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Amount</label>
                                                <input type="number" name="amount10" step="0.001" class="form-control">
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