@extends('layouts.app')

@section('content')

<!-- MAIN CONTENT-->
	<div class="row">
	        <H2 align="center" style="width: 12pc; color:white" >{{$monthname}}</H2>
	</div>
    <div class="row">
            <div class="col-sm-4">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
                @endif
                @if(Session::has('flash_message_delete'))
                    <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
                @endif
            </div>
            <div class="col-sm-4">

            </div>
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white"></h2>
                                </div>
                                <div class="text">
                                    <h2>{{ $rentalcount }}</h2>
                                    <span>Cases</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{  $totalprofit }}</h2>
                                    <span>Company Profit</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{ $totalpayoutcomm }}</h2>
                                    <span>Total Payout Comm</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{ $totalsst }}</h2>
                                    <span>SST</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white">RM</h2>
                                </div>
                                <div class="text">
                                    <h2>{{ $totalgdp }}</h2>
                                    <span>GDP</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
            	<!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead style="background-color: #fffafa;f1a1a;">
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Date</th>
                                            <th>CP Num</th>
                                            <th>Category</th>
                                            <th>Agent</th>
                                            <th>SST</th>
                                            <th>Profit</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($allrental as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->date}}</td>
                                            <td>{{$data->num}}</td>
                                            @if($data->category == '1')
                                            <td>Rental</td>
                                            @elseif($data->category == '2')
                                            <td>Subsale</td>
                                            @endif
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->percentsst}}</td>
                                            @if($data->status == "success")
                                            <td align="center"><span class="badge badge-success">{{$data->profitcompany}}</span></td>
                                            @elseif($data->status == "process")
                                            <td align="center"><span class="badge badge-primary">{{$data->profitcompany}}</span></td>
                                            @elseif($data->status =="cancel")
                                            <td align="center"><span class="badge badge-danger">{{$data->profitcompany}}</span></td>
                                            @endif
                                            <td><a href="{{ route('detailsrentalmonth', $data->id) }}"><span class="badge badge-primary">view</span>  | &nbsp <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('RentalController@destroy', ['id' => $data->id, 'type' => 'month']) }}"><span class="badge badge-danger">delete</span></a></td>
                                        </tr>
                                    @endforeach
                                 
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
            </div>
                <div class="row">
                    <div class="col-sm-2">
                    <a href="{{ route('listmonth') }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ action('ExcelController@excelrentalmonth', [$month,$year]) }}"><button type="button" class="btn btn-success">Export to excell</button></a>
                    </div>
                </div>

@endsection