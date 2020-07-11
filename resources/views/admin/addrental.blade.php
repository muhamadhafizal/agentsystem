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
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Name</label>
	                                        <input type="text" name="tenantname" placeholder="Enter tenant name" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Email</label>
	                                        <input type="email" name="tenantemail" placeholder="Enter tenant email" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Contact</label>
	                                        <input type="text" name="tenantcontact" placeholder="Enter tenant contact" class="form-control">
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Stemduty</label>
                                            <input type="number" name="stemduty" placeholder="Enter stemduty" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">AgreementFee</label>
                                            <input type="number" name="agreementfee" placeholder="Enter Agreement Fee" class="form-control" required>
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
                                            <label class=" form-control-label">Fee</label>
	                                        <input type="number" name="fee" id="fee" placeholder="Enter Fee" class="form-control myField" required>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">SST</label>
	                                        <input type="text" name="sst" id="sst"  class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Category</label>
                                            <select name="category" class="form-control">
                                                <option value="1">Rental</option>
                                                <option value="2">Subsale</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
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