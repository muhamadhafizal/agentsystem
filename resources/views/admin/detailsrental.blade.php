@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-4">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                            @endif
                        </div>
                        <div class="col-sm-8">

                        </div>
           
                </div>
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Details</strong>
	                            <small>Rental</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">CP Num</label>
                                            <input type="text" name="num" value="{{ $rentaldetails->num }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Date</label>
                                            <input type="date" id="thedate" name="date" value="{{ $rentaldetails->date }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-lg-12">
                                            <label class=" form-control-label">Address</label>
                                            <input type="text" name="address" value="{{ $rentaldetails->address }}"  class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner Name</label>
	                                        <input type="text" name="ownername" value="{{ $rentaldetails->ownername }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner IC</label>
	                                        <input type="text" name="owneremail" value="{{ $rentaldetails->owneremail }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Owner Contact</label>
	                                        <input type="text" name="ownercontact" value="{{ $rentaldetails->ownercontact }}" class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Name</label>
	                                        <input type="text" name="tenantname" value="{{ $rentaldetails->tenantname }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant IC</label>
	                                        <input type="text" name="tenantemail" value="{{ $rentaldetails->tenantemail }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Contact</label>
	                                        <input type="text" name="tenantcontact" value="{{ $rentaldetails->tenantcontact }}" class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Agent</label>
                                            <input type="text" class="form-control" name="agent" value="{{ $rentaldetails->nickname }}" readonly>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Stemduty</label>
	                                        <input type="text" name="stemduty" value="{{ $rentaldetails->stemduty }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">AgreementFee</label>
                                            <input type="number" id="agreementfee" name="agreementfee" value="{{ $rentaldetails->agreementfee }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">SST AgreementFee</label>
                                            <input type="number" id="sstagreementfee" name="sstagreementfee" value="{{ $rentaldetails->sstagreementfee }}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">AgreementFee After SST</label>
                                            <input type="number" id="agreementfeeaftersst" name="agreementfeeaftersst" value="{{ $rentaldetails->agreementfeeaftersst }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Total Comm</label>
	                                        <input type="text" name="fee" id="fee" value="{{ $rentaldetails->fee }}" class="form-control myField" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">SST</label>
	                                        <input type="text" name="sst" id="sst" value="{{ $rentaldetails->percentsst }}"  class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Comm In</label>
	                                        <input type="text" name="fee" id="fee" value="{{ $rentaldetails->commin }}" class="form-control myField" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Net Comm</label>
	                                        <input type="text" name="fee" id="fee" value="{{ $rentaldetails->netcomm }}" class="form-control myField" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Agent Percent</label>
	                                        <input type="text" name="percentagent" value="{{ $rentaldetails->percentagent }}"  class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class="form-control-label">IP</label>
                                            <input type="text" class="form-control" name="total" value="{{ $rentaldetails->percentip }}" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">GOP 1</label>
	                                        <input type="text" name="profitcompany" value="{{ $rentaldetails->percentgopone }}" class="form-control myField" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">GOP 2</label>
	                                        <input type="text" name="profitcompany" value="{{ $rentaldetails->percentgoptwo }}" class="form-control myField" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <label class="form-control-label">Lead</label>
                                            <input type="text" class="form-control" name="percentip" value="{{ $rentaldetails->percentlead }}" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Prelead</label>
	                                        <input type="text" name="percentgopone" value="{{ $rentaldetails->percentprelead }}" class="form-control myField" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Company Profit</label>
	                                        <input type="text" name="percentgoptwo" value="{{ $rentaldetails->profitcompany }}"  class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Total Payout</label>
	                                        <input type="text" name="percentgoptwo" value="{{ $rentaldetails->totalpayoutcomm }}"  class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Category</label>
                                            <input type="text" class="form-control" name="category" value="{{ $category }}" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            @if($category == 'Rental')
                                            <label class="form-control-label">Rental Amount</label>
                                            @elseif($category == 'Subsale')
                                            <label class="form-control-label">Purchase Price</label>
                                            @endif
                                            <input type="text" class="form-control" name="gdp" value="{{ $rentaldetails->gdp }}" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Status</label>
                                            <input type="text" class="form-control" name="status" value="{{ $rentaldetails->status }}" readonly>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ route('allrentals') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>&nbsp<button type="button" class="btn btn-primary" onclick="window.location='{{ action('RentalController@edit', ['id' => $rentaldetails->id, 'type' => 'main']) }}'">edit</button>
	                                </div>
	                            </div>
	                        </form>
	                        </div>
	                    </div>
	                </div>
	             </div>


@endsection