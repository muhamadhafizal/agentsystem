@extends('layouts.appagents')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	        	<div class="row">
	        	    <div class="col-sm-12">
	        	        @if(Session::has('flash_message'))
	        	            <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
	        	        @endif
                        @if(Session::has('flash_message_delete'))
                                <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
                        @endif
	        	    </div>
	        	</div>
	            <div class="row">

                <div class="col-lg-2">
                </div>
                <div class="col-md-6 text-left mb-3">
                <a href="{{ route('agentlistotl') }}"><button class="btn btn-primary"> back</button></a>
                </div>
                <div class="col-md-4 text-right mb-3">
                </div>

                <div class="col-lg-2">
                </div>
	                <div class="col-lg-8">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>OTL</small>
	                        </div>
                            <form class="form-horizontal" method="POST" action="{{ route('storeotl') }}">
	                        	     {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Date Of Agreement : </label>
                                                <input type="date" name="date_of_agreement" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">RE: Property known as : </label>
                                                <input type="text" name="property_address" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Start Date Of Commencement : </label>
                                                <input type="date" name="date_of_commencement" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">End Date Of Commencement : </label>
                                                <input type="date" name="end_date_of_commencement" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Tenancy Period : </label>
                                                <input type="text" name="tenancy_period" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Renewal Term : </label>
                                                <input type="text" name="renewal_term" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Monthly Rental as agreed : </label>
                                                <input type="number" name="monthly_rental" step="0.001" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Advance Rental of the month: </label>
                                                <input type="number" name="advance_rental" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Security Deposit: </label>
                                                <input type="number" name="security_deposit" step="0.001" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Utility Deposit: </label>
                                                <input type="number" name="utility_deposit" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Deduct Earnest Deposit Paid : </label>
                                                <input type="number" name="deduct_deposit" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Balance To Paid to vendor: </label>
                                                <input type="number" name="balance_to_paid" step="0.001" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class="form-control-label">Cash / Cheque</label>
                                                <select name="type" class="form-control">
                                                    <option value="cash">Cash</option>
                                                    <option value="cheque">Cheque</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cheque Number (If Applicable) : </label>
                                                <input type="text" name="cheque_no" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class=" form-control-label">Pay Before : </label>
                                                <input type="date" name="pay_before" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Vendor Name : </label>
                                                <input type="text" name="vendor_name" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Vendor IC : </label>
                                                <input type="text" name="vendor_ic" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Vendor Contact : </label>
                                                <input type="text" name="vendor_contact" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Vendor Email : </label>
                                                <input type="email" name="vendor_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Tenant Name : </label>
                                                <input type="text" name="tenant_name" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Tenant IC : </label>
                                                <input type="text" name="tenant_ic" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Tenant Contact : </label>
                                                <input type="text" name="tenant_contact" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Tenant Email : </label>
                                                <input type="text" name="tenant_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Agent Landlord : </label>
                                                <select name="agent_vendor" class="form-control">
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
                                                <label class=" form-control-label">Cobroke Agent Landlord Name :  </label>
                                                <input type="text" name="others_vendor_name" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Landlord IC :  </label>
                                                <input type="text" name="others_vendor_ic" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <label class="form-control-label">Agent Tenant :</label>
                                                <select name="agent_tenant" class="form-control">
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
                                                <label class=" form-control-label">Cobroke Agent Tenant Name :   </label>
                                                <input type="text" name="others_tenant_name" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <label class=" form-control-label">Cobroke Agent Tenant IC :  </label>
                                                <input type="text" name="others_tenant_ic" class="form-control">
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