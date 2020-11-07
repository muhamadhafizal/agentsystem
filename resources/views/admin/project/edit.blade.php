@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
                    <div class="col-lg-3"></div>
	                <div class="col-lg-6">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Edit</strong>
	                            <small>Project</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('updateproject') }}">
	                        	     {{ csrf_field() }}
                                     <div class="form-group">
                                                <label class=" form-control-label">Date</label>
                                                <input type="date" name="date" value="{{$detailsproject->date}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Unit</label>
                                                <input type="text" name="unit" value="{{$detailsproject->unit}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Purchaser 1</label>
                                                <input type="text" name="purchaser" value="{{$detailsproject->purchaser}}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Purchaser 2</label>
                                                <input type="text" name="purchasertwo" value="{{$detailsproject->purchasertwo}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                                <label class="form-control-label">Agent 1</label>
                                                <select name="agentone" class="form-control">
                                                <option value="{{$detailsproject->agentidone}}">{{$detailsproject->agentnameone}}</option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 2</label>
                                                <select name="agenttwo" class="form-control">
                                                <option value="{{$detailsproject->agentidtwo}}">{{$detailsproject->agentnametwo}}</option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                    <option value=""></option>
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 3</label>
                                                    <select name="agentthree" class="form-control">
                                                    <option value="{{$detailsproject->agentidthree}}">{{$detailsproject->agentnamethree}}</option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                        <option value=""></option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 4</label>
                                                    <select name="agentfour" class="form-control">
                                                    <option value="{{$detailsproject->agentidfour}}">{{$detailsproject->agentnamefour}}</option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                        <option value=""></option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Spa Price RM</label>
                                                <input type="number" name="spa" value="{{$detailsproject->spaprice}}" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Net Selling RM</label>
                                                <input type="number" name="netselling" value="{{$detailsproject->netselling}}" step="0.01" class="form-control" required>     
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent Comm %</label>
                                                <input type="number" name="percentcomm" value="{{$detailsproject->percentcomm}}" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent PoolFund %</label>
                                                <input type="number" name="percentpoolfund" value="{{$detailsproject->percentpoolfund}}" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent Company %</label>
                                                <input type="number" name="percentcompany" value="{{$detailsproject->percentcompany}}" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class="form-control-label">Leader 1</label>
                                                <select name="leaderone" class="form-control">
                                                <option value="{{$detailsproject->leaderone}}">{{$leadernameone}}</option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Leader 2</label>
                                                <select name="leadertwo" class="form-control">
                                                <option value="{{$detailsproject->leadertwo}}">{{$leadernametwo}}</option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                    <option value=""></option>
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Leader 3</label>
                                                    <select name="leaderthree" class="form-control">
                                                    <option value="{{$detailsproject->leaderthree}}">{{$leadernamethree}}</option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                        <option value=""></option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">leader 4</label>
                                                    <select name="leaderfour" class="form-control">
                                                    <option value="{{$detailsproject->leaderfour}}">{{$leadernamefour}}</option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                        <option value=""></option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Status</label>
                                                    <select name="status" class="form-control">
                                                    <option value="{{$detailsproject->status}}">{{$detailsproject->status}}</option>
                                                        <option value="process">process</option>
                                                        <option value="success">success</option>
                                                        <option value="cancel">cancel</option>
                                                    </select>
                                    </div>
                                    <input type="hidden" name="type" value="{{$type}}">
                                    <input type="hidden" name="id" value="{{$detailsproject->id}}">
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
                    </div>
                    <div class="col-lg-3"></div>
	             </div>


@endsection