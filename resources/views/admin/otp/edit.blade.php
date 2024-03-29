@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	        	<div class="row">
	        	    <div class="col-sm-12">
	        	        @if(Session::has('flash_message'))
	        	            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
	        	        @endif
                        @if(Session::has('flash_message_delete'))
	        	            <div class="alert alert-danger"><span class="fa fa-warning"></span><em> {!! session('flash_message_delete') !!}</em></div>
	        	        @endif
	        	    </div>
	        	</div>
	            <div class="row">

                <div class="col-lg-2">
                </div>
                <div class="col-md-6 text-left mb-3">
                <a href="{{ route('adminlistotp') }}"><button class="btn btn-primary"> back</button></a>
                </div>
                <div class="col-md-4 text-right mb-3">
                </div>

                <div class="col-lg-2">
                </div>
	                <div class="col-lg-8">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>OTP</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('adminupdateotp') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Date Of This Offer : </label>
                                                <input type="date" name="date_offer" value="{{$details->date_offer}}"  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Property Address : </label>
                                                <input type="text" name="sales_property" value="{{$details->sales_property}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Stakeholder : </label>
                                                <input type="text" name="stakeholder" value="{{$details->stakeholder}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Deposit Paid To : </label>
                                                <input type="number" name="deposit" value="{{$details->deposit}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Purchase Price : </label>
                                                <input type="number" name="purchase_price" value="{{$details->purchase_price}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">SPA Deposit (RM): </label>
                                                <input type="number" name="amount_paid" value="{{$details->amount_paid}}" step="0.001" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Special Condition: </label>
                                                <textarea class="form-control" name="condition_one" cols="5" rows="5">{{$details->condition_one}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Vendor Name : </label>
                                                <input type="text" name="vendor_name" value="{{$details->vendor_name}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Vendor IC : </label>
                                                <input type="text" name="vendor_ic" value="{{$details->vendor_ic}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Purchaser Name : </label>
                                                <input type="text" name="purchaser_name" value="{{$details->purchaser_name}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Purchaser IC : </label>
                                                <input type="text" name="purchaser_ic" value="{{$details->purchaser_ic}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Agent MW Vendor :</label>
                                                <select name="agent_vendor" class="form-control">
                                                <option value="{{$details->agentvendor_id}}">{{$vendor_name}}</option>
                                                    <option value="0"></option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Vendor Name : </label>
                                                <input type="text" name="others_vendor_name" value="{{$details->others_vendor_name}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Vendor IC :  </label>
                                                <input type="text" name="others_vendor_ic" value="{{$details->others_vendor_ic}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Agent MW Purchaser :</label>
                                                <select name="agent_tenant" class="form-control">
                                                  <option value="{{$details->agenttenant_id}}">{{$tenant_name}}</option>
                                                    <option value="0"></option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Purchaser Name :  </label>
                                                <input type="text" name="others_tenant_name" value="{{$details->others_tenant_name}}" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Purchaser IC :  </label>
                                                <input type="text" name="others_tenant_ic" value="{{$details->others_tenant_ic}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Status</label>
                                                <select name="status" class="form-control">
                                                <option value="{{$details->status}}">{{$status}}</option>
                                                <option value="0">success</option>
                                                <option value="1">cancel</option>      
                                                </select>
                                            </div>
                                        </div>
                                    </div>    
                                    <input type="hidden" name="otp_id" value="{{$details->id}}">                   
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