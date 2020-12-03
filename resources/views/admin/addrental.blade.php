@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Rental / Subsale</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('storerental') }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">CP Num</label>
                                            <input type="text" name="num" placeholder="Enter CP Number" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Date</label>
                                            <input type="date" id="thedate" name="date" placeholder="Enter date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-lg-12">
                                            <label class=" form-control-label">Address</label>
                                            <input type="text" name="address" placeholder="Enter Address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner Name</label>
	                                        <input type="text" name="ownername" placeholder="Enter owner name" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner IC</label>
	                                        <input type="text" name="owneremail" placeholder="Enter owner ic" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner Contact</label>
	                                        <input type="text" name="ownercontact" placeholder="Enter owner contact" class="form-control">
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Name</label>
	                                        <input type="text" name="tenantname" placeholder="Enter tenant name" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant IC</label>
	                                        <input type="text" name="tenantemail" placeholder="Enter tenant ic" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Contact</label>
	                                        <input type="text" name="tenantcontact" placeholder="Enter tenant contact" class="form-control">
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Agent</label>
                                            <select name="agent" class="form-control">
                                                @foreach($alluser as $data)
			                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
												@endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Stemduty</label>
                                            <input type="number" name="stemduty" placeholder="Enter stemduty" class="form-control" required>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">AgreementFee</label>
                                            <input type="number" name="agreementfee" placeholder="Enter Agreement Fee" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Total Comm</label>
	                                        <input type="number" step="0.01" name="fee" id="fee" placeholder="Total Comm" class="form-control myField" required>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">SST</label>
	                                        <input type="text" name="sst" id="sst"  class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Comm In</label>
	                                        <input type="number" step="0.01" name="commin" id="commin" placeholder="Comm In" class="form-control" required>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Net Comm</label>
	                                        <input type="number" name="netcomm" id="netcomm" placeholder="Net Comm" class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Category</label>
                                            <select name="category" class="form-control" id="category" onfocus="this.selectedIndex = -1;">
                                                <option value="1">Rental</option>
                                                <option value="2">Subsale</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label" id="gdp">Rental Amount</label>
                                            <input type="number" name="gdp" placeholder="amount" class="form-control" required>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="process">process</option>
                                                <option value="success">success</option>
                                                <option value="cancel">cancel</option>
                                            </select>
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