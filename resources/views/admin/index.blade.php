@extends('layouts.app')

@section('content')

<!-- MAIN CONTENT-->
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        <div class="row">
                <div class="form-group mx-sm-3 mb-2">
                  <h2 style="color: white">Year :</h2>
                </div>
                 <div class="form-group mx-sm-3 mb-2">
                   <input class="date-own form-control" style="width: 100px;" type="number" id="yearchart" readonly="true" value="2021">
                 </div>
                 <button id ="year" class="btn btn-primary mb-2">Submit</button>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <h2 style="color: white"></h2>
                                </div>
                                <div class="text">
                                    <h2 id="cases">{{$rentalcount}}</h2>
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
                                    <h2 id="totalprofit">{{$totalprofit}}</h2>
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
                                    <h2 id="totalpayoutcomm">{{$totalpayoutcomm}}</h2>
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
                                    <h2 id="totalsst">{{$totalsst}}</h2>
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
                                    <h2 id="totalgdp">{{$totalgdp}}</h2>
                                    <span>GDP</span>
                                </div>
                            </div>
                            <div class="overview-chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Rental & Subsale</h3>
                            <canvas id="singelBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
@endsection