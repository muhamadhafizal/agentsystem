@extends('layouts.app')
@section('content')
            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group mx-sm-3 mb-2">
                                  <h2 style="color: grey">Year :</h2>
                                </div>
                                 <div class="form-group mx-sm-3 mb-2">
                                   <input class="date-own form-control" style="width: 100px;" name="year" readonly="true" placeholder="2020">
                                 </div>
                                 <button class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </form>
                        <div class="row m-t-25">
                            <div class="col-sm-3 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[1,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1</h2>
                                                <span>January</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[2,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>2</h2>
                                                <span>February</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[3,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>3</h2>
                                                <span>March</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[4,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>4</h2>
                                                <span>April</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[5,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>5</h2>
                                                <span>Mei</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[6,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>6</h2>
                                                <span>June</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[7,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>7</h2>
                                                <span>July</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[8,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>8</h2>
                                                <span>August</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[9,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>9</h2>
                                                <span>September</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[10,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>10</h2>
                                                <span>October</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[11,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>11</h2>
                                                <span>November</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <a href="{{ action('RentalController@getmonth',[12,2020]) }}">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>12</h2>
                                                <span>December</span>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="overview-chart">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
@endsection