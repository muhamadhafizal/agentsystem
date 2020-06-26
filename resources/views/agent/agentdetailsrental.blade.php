@extends('layouts.appagents')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
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
                                    <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">No</label>
                                            <input type="text" name="num" value="{{$rentaldetails->num}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Date</label>
                                            <input type="date" id="thedate" name="date" value="{{$rentaldetails->date}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Area</label>
                                            <input type="text" name="area" value="{{$rentaldetails->name}}" class="form-control" readonly>
                                            
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Name</label>
	                                        <input type="text" name="tenantname" value="{{$rentaldetails->tenantname}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Email</label>
	                                        <input type="email" name="tenantemail" value="{{$rentaldetails->tenantemail}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Contact</label>
	                                        <input type="text" name="tenantcontact" value="{{$rentaldetails->tenantcontact}}" class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Fee</label>
	                                        <input type="text" name="fee" id="fee" value="{{$rentaldetails->fee}}" class="form-control myField" readonly>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Agent</label>
                                            <input type="text" class="form-control" name="agent" value="{{$rentaldetails->nickname}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Category</label>
                                            <input type="text" class="form-control" name="category" value="{{$category}}" readonly>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Status</label>
                                            <input type="text" class="form-control" name="status" value="{{$rentaldetails->status}}" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Commission Agent</label>
                                            <input type="text" class="form-control" value="{{$commagent}}" readonly>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Contribution Agent</label>
	                                        <input type="text" value="{{$contagent}}" class="form-control myField" readonly>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
                                    @if($type == 'main')
                                    <a href="{{ route('agentlistrental') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
	                                @elseif($type == 'month')
                                    <a href="{{ action('AgentController@getmonth',[$month,$year])  }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                                    @endif
                                    </div>
	                            </div>
	                        </form>
	                        </div>
	                    </div>
	                </div>
	             </div>


@endsection