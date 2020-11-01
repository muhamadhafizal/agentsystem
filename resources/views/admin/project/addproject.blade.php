@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
                    <div class="col-lg-3"></div>
	                <div class="col-lg-6">
	                    <div class="card">
	                        <div class="card-header">
	                            <strong>Add</strong>
	                            <small>Project</small>
	                        </div>
	                        <div class="card-body card-block">
	                        	<form class="form-horizontal" method="POST" action="{{ route('storeproject') }}">
	                        	     {{ csrf_field() }}
                                     <div class="form-group">
                                                <label class=" form-control-label">Date</label>
                                                <input type="date" name="date" placeholder="Enter date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Unit</label>
                                                <input type="text" name="unit" placeholder="Enter Unit" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Purchaser</label>
                                                <input type="text" name="purchaser" placeholder="Enter Purchaser" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class="form-control-label">Agent 1</label>
                                                <select name="agentone" class="form-control">
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 2</label>
                                                <select name="agenttwo" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 3</label>
                                                    <select name="agentthree" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Agent 4</label>
                                                    <select name="agentfour" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Spa Price RM</label>
                                                <input type="number" name="spa" placeholder="Spa Price" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Net Selling RM</label>
                                                <input type="number" name="netselling" placeholder="Net Selling" step="0.01" class="form-control" required>     
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent Comm %</label>
                                                <input type="number" name="percentcomm" placeholder="percent comm" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent PoolFund %</label>
                                                <input type="number" name="percentpoolfund" placeholder="percent poolfund" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class=" form-control-label">Percent Company %</label>
                                                <input type="number" name="percentcompany" placeholder="percent company" step="0.01" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                                <label class="form-control-label">Leader 1</label>
                                                <select name="leaderone" class="form-control">
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Leader 2</label>
                                                <select name="leadertwo" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($alluser as $data)
                                                    <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">Leader 3</label>
                                                    <select name="leaderthree" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-control-label">leader 4</label>
                                                    <select name="leaderfour" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($alluser as $data)
                                                        <option value="{{$data->id}}">{{$data->nickname}}</option>
                                                        @endforeach
                                                    </select>
                                    </div>
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