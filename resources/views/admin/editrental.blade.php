@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Rental</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('updaterental', $rentaldetails->id) }}">
	                        	     {{ csrf_field() }}
	                            <div class="form-group">
                                    <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">CP Num</label>
                                            <input type="text" name="num" value="{{ $rentaldetails->num }}" class="form-control">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class=" form-control-label">Date</label>
                                            <input type="date" id="thedate" name="date" value="{{ $rentaldetails->date }}"  class="form-control" required>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Name</label>
	                                        <input type="text" name="tenantname" value="{{ $rentaldetails->tenantname }}"  class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Email</label>
	                                        <input type="email" name="tenantemail" value="{{ $rentaldetails->tenantemail }}" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class=" form-control-label">Tenant Contact</label>
	                                        <input type="text" name="tenantcontact" value="{{ $rentaldetails->tenantcontact }}" class="form-control">
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Agent</label>
                                            <select name="agent" class="form-control">
                                                <option value="{{$rentaldetails->agent}}">{{$rentaldetails->nickname}}</option>
                                                @foreach($alluser as $data)
			                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
												@endforeach
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Stemduty</label>
                                            <input type="number" name="stemduty" value="{{ $rentaldetails->stemduty }}" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label class="form-control-label">Agreement Fee</label>
                                            <input type="number" name="agreementfee" value="{{ $rentaldetails->agreementfee }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
	                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Total Comm</label>
	                                        <input type="number" name="fee" id="fee" value="{{ $rentaldetails->fee }}" class="form-control myField" required>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">SST</label>
	                                        <input type="text" name="sst" id="sst" value="{{ $rentaldetails->percentsst }}"  class="form-control" readonly>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Comm In</label>
	                                        <input type="number" name="commin" id="commin" value="{{ $rentaldetails->commin }}" class="form-control" required>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <label class=" form-control-label">Net Comm</label>
	                                        <input type="number" name="netcomm" id="netcomm" value="{{ $rentaldetails->netcomm }}" class="form-control" readonly>
                                        </div>
                                    </div>
	                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Category</label>
                                            <select name="category" class="form-control">
                                                <option value="{{$rentaldetails->category}}">{{$category}}</option>
                                                <option value="1">Rental</option>
                                                <option value="2">Subsale</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-control-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="{{$rentaldetails->status}}">{{$rentaldetails->status}}</option>
                                                <option value="process">process</option>
                                                <option value="success">success</option>
                                                <option value="cancel">cancel</option>
                                            </select>
                                        </div>
                                    </div>
	                            </div>
                                <input type="hidden" name="type" value="{{ $type }}">
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