@extends('layouts.appagents')

@section('content')
<!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                        <h2 style="color: white">Year :</h2>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                        <input class="date-own form-control" style="width: 100px;" type="number" id="yearchartagent" readonly="true" value="2024">
                        </div>
                        <button id ="yearagent" class="btn btn-primary mb-2">Submit</button>
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
                                    <h2 id="cases">{{$cases}}</h2>
                                    <span>Total</span>
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
                                    <h2 id="totalprocess">{{$totalprocess}}</h2>
                                    <span>Process</span>
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
                                    <h2 id="totalsuccess">{{$totalsuccess}}</h2>
                                    <span>Success</span>
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
                            <h3 class="title-2 m-b-40">Rental & Subsale Agent</h3>
                            <canvas id="singleBarChartAgent"></canvas>
                        </div>
                    </div>
                </div>
            </div>
@endsection