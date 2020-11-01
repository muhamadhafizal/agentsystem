@extends('layouts.appagents')

@section('content')


<div class="section__content section__content--p30">
	        <div class="container-fluid"> 
	            <div class="row">
                    <div class="col-lg-3"></div>
	                <div class="col-lg-6">
                        <div class="card">
	                        <div class="card-header">
                                <div class="row">
                                    <div class="col-11"> 
                                        <strong>Tiering</strong>
                                        <small>Project</small>
                                    </div>
                                    <div class="col-1">
                                        <button onclick="myFunction()"><i id="text" class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="myDivFunction">
                                <div class="card-body card-block">
                                <div>
                                    <div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Unit</label>
                                        <input type="text" name="unit" value="{{$temparray['unit']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="comperperson" value="{{$temparray['comm']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">SST (RM)</label>
                                        <input type="text" name="sst" value="{{$temparray['sst']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Net Comm (RM)</label>
                                        <input type="text" name="commpersondeductsst" value="{{$temparray['netcomm']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Agent</label>
                                        <input type="text" name="agentname" value="{{$agentdetails['nameagent']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tiering %</label>
                                        <input type="text" name="tr" value="{{$agentdetails['tiering']}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">AgentComm (RM)</label>
                                        <input type="text" name="agentcomm" value="{{$agentdetails['agentcomm']}}" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Agent</label>
                                                <input type="text" name="goponename" value="{{$agentdetails['gopnameone']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Percent (RM)</label>
                                                <input type="text" name="goponecomm" value="{{$agentdetails['gopcommone']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Agent</label>
                                                <input type="text" name="goptwoname" value="{{$agentdetails['gopnametwo']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Percent (RM)</label>
                                                <input type="text" name="goptwocomm" value="{{$agentdetails['gopcommtwo']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">IP Agent</label>
                                                <input type="text" name="ipname" value="{{$agentdetails['ipname']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">IP Percent (RM)</label>
                                                <input type="text" name="ipcomm" value="{{$agentdetails['ipcomm']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Lead Agent</label>
                                                <input type="text" name="leadname" value="{{$agentdetails['leadname']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Lead Percent (RM)</label>
                                                <input type="text" name="leadcomm" value="{{$agentdetails['leadcomm']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Prelead Agent</label>
                                                <input type="text" name="preleadname" value="{{$agentdetails['preleadname']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Prelead Percent (RM)</label>
                                                <input type="text" name="preleadcomm" value="{{$agentdetails['preleadcomm']}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Total (RM)</label>
                                        <input type="text" name="total" value="{{$agentdetails['total']}}" class="form-control" readonly>
                                    </div>

                                </div>
                                </div>
                              
                            </div>
                            
                        </div>
                        <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
                                    @if($type == 'main')
                                    <a href="{{ route('agentlistproject') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
	                                @elseif($type == 'month')
                                    <a href="{{ action('AgentprojectController@getmonth',[$month,$year])  }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                                    @endif
                                    </div>
	                            </div>
                    <div class="col-lg-3"></div>
                 </div>
</div>
                 
                 <script>
                    function myFunction() {
                        var x = document.getElementById("myDivFunction");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            $("#text").removeClass("fas fa-plus").addClass("fas fa-minus");
                        } else {
                            x.style.display = "none";
                            $("#text").removeClass("fas fa-minus").addClass("fas fa-plus");
                        }
                    }
                </script>

@endsection