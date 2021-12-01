@extends('admin.layouts.master_layout')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">

				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Stores</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ count($stores)}}</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Category</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ count($categories)}}</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Ratings</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ count($ratings)}}</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="mt-3 row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mg-b-0">Ratings</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0">Category</th>
                                                <th class="border-bottom-0">Image</th>
                                                <th class="border-bottom-0">Rating</th>
                                                <th class="border-bottom-0">User Ratings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ( $stores as  $store)
                                        <tr>
                                            <td class="">{{$loop->index+1}}</td>
                                            <td class="w-25">{{$store->name}}</td>
                                                <th class="w-25 border-bottom-0"> {{$store->category->name}}</th>
                                                <th class="w-25 border-bottom-0"> <img alt="{{$store->name}}" class="rounded"  width="200px" height="150px"
                                                    src="{{Storage::url($store->image)}}"></th>
                                                    <th class=" w-25 border-bottom-0">  @if (count($store->rating) > 0)
                                                        @for ($i =0 ; $i <ceil($store->rating[0]->rating) ; $i++)
                                                        <i class="ion ion-md-star text-warning"></i>
                                                        @endfor
                                                        @for ($i =0 ; $i <5-ceil($store->rating[0]->rating) ; $i++)
                                                            <i class="ion ion-md-star-outline text-warning"></i>
                                                        @endfor
                                                        @else
                                                        @for ($i =0 ; $i <5 ; $i++)
                                                            <i class="ion ion-md-star-outline text-warning"></i>
                                                            @endfor
                                                        @endif</th>
                                            <th class="w-25 border-bottom-0">
                                                @foreach ($store->ratings as $ip )
                                                    <h6>{{$ip->user_id}}</h6>
                                                @endforeach
                                            </th>
                                        </tr>
                                        {{-- @endisset --}}
                                        @endforeach
                                        </tbody>
                                        {{-- {{$stores->links()}} --}}
                                    </table>
                                    {{-- {{$stores->links()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
        <!-- row opened -->

    </div>
</div>
</div>
</div>

@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
