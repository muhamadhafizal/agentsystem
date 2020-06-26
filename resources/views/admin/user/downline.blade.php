@extends('layouts.app')

@section('content')
            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<!-- Prelead -->
						@if($preleadarray)
						<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 style="color:white">Prelead</h3>
                                <div class="table-responsive m-b-40">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="100">No</th>
                                            <th>Nickname</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($preleadarray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->level}}</td>
                                        </tr>
                                    @endforeach
									<?php $i = 1 ?>
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
						@endif
						@if($consultantarray)
						<!-- Consultant -->
						<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 style="color:white">Consultant</h3>
                                <div class="table-responsive m-b-40">
                                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
										<tr>
                                            <th width="100">No</th>
                                            <th>Nickname</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($consultantarray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->level}}</td>
                                        </tr>
                                    @endforeach
									<?php $i = 1 ?>
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
						@endif
						@if($goponearray)
						<!-- GOP 1 -->
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 style="color:white">List of GOP1</h3>
                                <div class="table-responsive m-b-40">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
										<tr>
                                            <th width="100">No</th>
                                            <th>Nickname</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($goponearray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->level}}</td>
                                        </tr>
                                    @endforeach
									<?php $i = 1 ?>
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
						@endif
						@if($goptwoarray)
						<!-- GOP TWO -->
						<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 style="color:white">List of GOP2</h3>
                                <div class="table-responsive m-b-40">
                                <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
										<tr>
                                            <th width="100">No</th>
                                            <th>Nickname</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($goptwoarray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->level}}</td>
                                        </tr>
                                    @endforeach
									<?php $i = 1 ?>
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
						@endif
						@if($iparray)
						<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 style="color:white">IP</h3>
                                <div class="table-responsive m-b-40">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
										<tr>
                                            <th width="100">No</th>
                                            <th>Nickname</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($iparray as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->nickname}}</td>
                                            <td>{{$data->level}}</td>
                                        </tr>
                                    @endforeach
									<?php $i = 1 ?>
                                    </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
						@endif
                        <div class="row">
							<div class="col-sm-2">
							<a href="{{ route('detailsagent', $id) }}"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button></a>
							</div>
							<div class="col-sm-10">
							</div>
						</div>

@endsection