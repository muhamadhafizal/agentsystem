@extends('layouts.app')

@section('content')

	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
                <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                            @endif
                        </div>
                        <div class="col-lg-3"></div>
           
                </div>
               
	            <div class="row">
                    <div class="col-lg-3"></div>
	                <div class="col-lg-6">
	                    <div class="card">
	                        <div class="card-header">
                            <div class="row">
                                    <div class="col-11"> 
                                        <strong>Detail</strong>
                                        <small>Project</small>
                                    </div>
                                    <div class="col-1">
                                        <button onclick="myFunctionmain()"><i id="textmain" class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div id="myDivFunctionMain">
	                        <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Date</label>
                                    <input type="text" name="date" value="{{$detailsproject->date}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Agent</label>
                                    @foreach($agentarray as $data)
                                        <li>{{$data}}</li>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Unit</label>
                                    <input type="text" name="unit" value="{{$detailsproject->unit}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Purchaser</label>
                                    <input type="text" name="purchaser" value="{{$detailsproject->purchaser}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Spa Price (RM)</label>
                                    <input type="text" name="spaprice" value="{{$detailsproject->spaprice}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Net Selling (RM)</label>
                                    <input type="text" name="netselling" value="{{$detailsproject->netselling}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">NetComm (RM)</label>
                                    <input type="text" name="netcomm" value="{{$detailsproject->netcomm}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Comm Perperson (RM)</label>
                                    <input type="text" name="commperperson" value="{{$detailsproject->commperperson}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">PoolFund (RM)</label>
                                    <input type="text" name="poolfundcomm" value="{{$detailsproject->poolfundcomm}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Leader</label>
                                    @foreach($leaderarray as $data)
                                        <li>{{$data}}</li>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">LeaderComm (RM)</label>
                                    <input type="text" name="leadercomm" value="{{$detailsproject->leadercomm}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Company (RM)</label>
                                    <input type="text" name="companycomm" value="{{$detailsproject->companycomm}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">The Roof (RM)</label>
                                    <input type="text" name="theroof" value="{{$detailsproject->theroofcomm}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tiering Diffrencial (RM)</label>
                                    <input type="text" name="tierindiff" value="{{$detailsproject->tieringdiff}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                        <label class=" form-control-label">TotalPayout</label>
                                        <input type="text" name="totalpayout" value="{{$detailsproject->totalpayout}}" class="form-control" readonly>
                                </div>
                            </div>
                            </div>
                        </div>
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
                                    @if($detailsproject->agentone != null)
                                    <div>
                                    <H4>AGENT 1</H4>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="comperperson" value="{{$detailsproject->commperperson}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">SST (RM)</label>
                                        <input type="text" name="sst" value="{{$detailsproject->sst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Net Comm (RM)</label>
                                        <input type="text" name="commpersondeductsst" value="{{$detailsproject->commpersondeductsst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Agent</label>
                                        <input type="text" name="agentnameone" value="{{$detailsproject->agentnameone}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tiering %</label>
                                        <input type="text" name="trone" value="{{$trone}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="agentcommone" value="{{$detailsproject->agentcommone}}" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Agent</label>
                                                <input type="text" name="goponenameone" value="{{$detailsproject->goponenameone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Percent (RM)</label>
                                                <input type="text" name="goponecommone" value="{{$detailsproject->goponecommone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Agent</label>
                                                <input type="text" name="goptwonameone" value="{{$detailsproject->goptwonameone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Percent (RM)</label>
                                                <input type="text" name="goptwocommone" value="{{$detailsproject->goptwocommone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">IP Agent</label>
                                                <input type="text" name="ipnameone" value="{{$detailsproject->ipnameone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">IP Percent (RM)</label>
                                                <input type="text" name="ipcommone" value="{{$detailsproject->ipcommone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Lead Agent</label>
                                                <input type="text" name="leadnameone" value="{{$detailsproject->leadnameone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Lead Percent (RM)</label>
                                                <input type="text" name="leadcommone" value="{{$detailsproject->leadcommone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Prelead Agent</label>
                                                <input type="text" name="preleadnameone" value="{{$detailsproject->preleadnameone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Prelead Percent (RM)</label>
                                                <input type="text" name="preleadcommone" value="{{$detailsproject->preleadcommone}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Total (RM)</label>
                                        <input type="text" name="totalone" value="{{$detailsproject->totalone}}" class="form-control" readonly>
                                    </div>
                                    @endif
                                    @if($detailsproject->agenttwo != null)
                                    <div>
                                    <H4>AGENT 2</H4>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="comperperson" value="{{$detailsproject->commperperson}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">SST (RM)</label>
                                        <input type="text" name="sst" value="{{$detailsproject->sst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Net Comm (RM)</label>
                                        <input type="text" name="commpersondeductsst" value="{{$detailsproject->commpersondeductsst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Agent</label>
                                        <input type="text" name="agentnametwo" value="{{$detailsproject->agentnametwo}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tiering %</label>
                                        <input type="text" name="trtwo" value="{{$trtwo}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="agentcommtwo" value="{{$detailsproject->agentcommtwo}}" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Agent</label>
                                                <input type="text" name="goponenametwo" value="{{$detailsproject->goponenametwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Percent (RM)</label>
                                                <input type="text" name="goponecommtwo" value="{{$detailsproject->goponecommtwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Agent</label>
                                                <input type="text" name="goptwonametwo" value="{{$detailsproject->goptwonametwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Percent (RM)</label>
                                                <input type="text" name="goptwocommtwo" value="{{$detailsproject->goptwocommtwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">IP Agent</label>
                                                <input type="text" name="ipnametwo" value="{{$detailsproject->ipnametwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">IP Percent (RM)</label>
                                                <input type="text" name="ipcommtwo" value="{{$detailsproject->ipcommtwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Lead Agent</label>
                                                <input type="text" name="leadnametwo" value="{{$detailsproject->leadnametwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Lead Percent (RM)</label>
                                                <input type="text" name="leadcommtwo" value="{{$detailsproject->leadcommtwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Prelead Agent</label>
                                                <input type="text" name="preleadnametwo" value="{{$detailsproject->preleadnametwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Prelead Percent (RM)</label>
                                                <input type="text" name="preleadcommtwo" value="{{$detailsproject->preleadcommtwo}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Total (RM)</label>
                                        <input type="text" name="totaltwo" value="{{$detailsproject->totaltwo}}" class="form-control" readonly>
                                    </div>
                                    @endif
                                    @if($detailsproject->agentthree != null)
                                    <div>
                                    <H4>AGENT 3</H4>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="comperperson" value="{{$detailsproject->commperperson}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">SST (RM)</label>
                                        <input type="text" name="sst" value="{{$detailsproject->sst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Net Comm (RM)</label>
                                        <input type="text" name="commpersondeductsst" value="{{$detailsproject->commpersondeductsst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Agent</label>
                                        <input type="text" name="agentnamethree" value="{{$detailsproject->agentnamethree}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tiering %</label>
                                        <input type="text" name="trthree" value="{{$trthree}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="agentcommthree" value="{{$detailsproject->agentcommthree}}" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Agent</label>
                                                <input type="text" name="goponenamethree" value="{{$detailsproject->goponenamethree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Percent (RM)</label>
                                                <input type="text" name="goponecommthree" value="{{$detailsproject->goponecommthree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Agent</label>
                                                <input type="text" name="goptwonamethree" value="{{$detailsproject->goptwonamethree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Percent (RM)</label>
                                                <input type="text" name="goptwocommthree" value="{{$detailsproject->goptwocommthree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">IP Agent</label>
                                                <input type="text" name="ipnamethree" value="{{$detailsproject->ipnamethree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">IP Percent (RM)</label>
                                                <input type="text" name="ipcommthree" value="{{$detailsproject->ipcommthree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Lead Agent</label>
                                                <input type="text" name="leadnamethree" value="{{$detailsproject->leadnamethree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Lead Percent (RM)</label>
                                                <input type="text" name="leadcommthree" value="{{$detailsproject->leadcommthree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Prelead Agent</label>
                                                <input type="text" name="preleadnamethree" value="{{$detailsproject->preleadnamethree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Prelead Percent (RM)</label>
                                                <input type="text" name="preleadcommthree" value="{{$detailsproject->preleadcommthree}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Total (RM)</label>
                                        <input type="text" name="totalthree" value="{{$detailsproject->totalthree}}" class="form-control" readonly>
                                    </div>
                                    @endif
                                    @if($detailsproject->agentfour != null)
                                    <div>
                                    <H4>AGENT 4</H4>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="comperperson" value="{{$detailsproject->commperperson}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">SST (RM)</label>
                                        <input type="text" name="sst" value="{{$detailsproject->sst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Net Comm (RM)</label>
                                        <input type="text" name="commpersondeductsst" value="{{$detailsproject->commpersondeductsst}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Agent</label>
                                        <input type="text" name="agentnamefour" value="{{$detailsproject->agentnamefour}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tiering %</label>
                                        <input type="text" name="trfour" value="{{$trfour}}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Comm (RM)</label>
                                        <input type="text" name="agentcommfour" value="{{$detailsproject->agentcommfour}}" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Agent</label>
                                                <input type="text" name="goponenamefour" value="{{$detailsproject->goponenamefour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 1 Percent (RM)</label>
                                                <input type="text" name="goponecommfour" value="{{$detailsproject->goponecommfour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Agent</label>
                                                <input type="text" name="goptwonamefour" value="{{$detailsproject->goptwonamefour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">GOP 2 Percent (RM)</label>
                                                <input type="text" name="goptwocommfour" value="{{$detailsproject->goptwocommfour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">IP Agent</label>
                                                <input type="text" name="ipnamefour" value="{{$detailsproject->ipnamefour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">IP Percent (RM)</label>
                                                <input type="text" name="ipcommfour" value="{{$detailsproject->ipcommfour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Lead Agent</label>
                                                <input type="text" name="leadnamefour" value="{{$detailsproject->leadnamefour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Lead Percent (RM)</label>
                                                <input type="text" name="leadcommfour" value="{{$detailsproject->leadcommfour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class=" form-control-label">Prelead Agent</label>
                                                <input type="text" name="preleadnamefour" value="{{$detailsproject->preleadnamefour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        <div class="form-group">
                                                <label class=" form-control-label">Prelead Percent (RM)</label>
                                                <input type="text" name="preleadcommfour" value="{{$detailsproject->preleadcommfour}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Total (RM)</label>
                                        <input type="text" name="totalfour" value="{{$detailsproject->totalfour}}" class="form-control" readonly>
                                    </div>
                                    @endif
                                </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
	                                <div class="col-md-6 col-md-offset-4">
                                    @if($type == 'main')
                                    <a href="{{ route('listproject') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>&nbsp<button type="button" class="btn btn-primary" onclick="window.location='{{ action('ProjectController@edit', ['id' => $detailsproject->id, 'type' => 'main']) }}'">edit</button>
                                    @else
                                    <a href="{{ action('ProjectController@getmonth',[$month,$year]) }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>&nbsp<button type="button" class="btn btn-primary" onclick="window.location='{{ action('ProjectController@edit', ['id' => $detailsproject->id, 'type'=> 'month']) }}'">edit</button>
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

                <script>
                    function myFunctionmain() {
                        var x = document.getElementById("myDivFunctionMain");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            $("#textmain").removeClass("fas fa-plus").addClass("fas fa-minus");
                        } else {
                            x.style.display = "none";
                            $("#textmain").removeClass("fas fa-minus").addClass("fas fa-plus");
                        }
                    }
                </script>


@endsection