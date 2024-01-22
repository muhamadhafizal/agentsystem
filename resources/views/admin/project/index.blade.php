@extends('layouts.app')

@section('content')

<!-- MAIN CONTENT-->
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                            <div class="row">
                                <div class="form-group mx-sm-3 mb-2">
                                <h3 style="color: white;"></h3>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                <select name="status" id="status" class="form-control" readonly="true">
                                            <option value="success">success</option>
                                            <option value="process">process</option>
                                            <option value="cancel">cancel</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input class="date-own form-control" style="width: 100px;" type="number" id="year" readonly="true" value="2024">
                                </div>
                                <button id="statusdashboard" class="btn btn-primary mb-2">Search</button>
                            </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
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
                                        <h2 id="totalcases">{{$totalcases}}</h2>
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
                                        <h2 id="totalnetselling">{{$totalnetselling}}</h2>
                                        <span>NetSelling</span>
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
                                        <h2 id="totalnetcomm">{{$totalnetcomm}}</h2>
                                        <span>NetComm</span>
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
                                        <h2 id="totalpoolfundcomm">{{$totalpoolfundcomm}}</h2>
                                        <span>PoolFundComm</span>
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
                                        <h2 id="totalcompanycomm">{{$totalcompanycomm}}</h2>
                                        <span>CompanyComm</span>
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
                                        <h2 id="totaldiff">{{$totaldiff}}</h2>
                                        <span>Tiering Differencial</span>
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
                            <h3 class="title-2 m-b-40">Project</h3>
                            <canvas id="projectChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
@endsection