@extends('layouts.appagents')

@section('content')

<!-- MAIN CONTENT-->
	<div class="row">
	        <H2 align="center" style="width: 12pc; color:grey" >{{$monthname}}</H2>
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
                                    <h2>12</h2>
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
                                    <h2>123</h2>
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
                                    <h2>123</h2>
                                    <span>SST</span>
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
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Date</th>
                                            <th>Num</th>
                                            <th>Category</th>
                                            <th>Area</th>
                                            <th>Agent</th>
                                            <th>SST</th>
                                            <th>Profit</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>6</td>
                                        <td>5</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                    </tr>
                                 
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
            </div>
                <div class="row">
                    <div class="col-sm-2">
                 
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                        <a href=""><button type="button" class="btn btn-success">Export to excell</button></a>
                    </div>
                </div>

@endsection