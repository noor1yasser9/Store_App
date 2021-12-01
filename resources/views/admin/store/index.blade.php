@extends('admin.layouts.master_layout')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
@endsection
@section('content')
				<!-- row opened -->
				<div class="mt-5 row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Stores</h4>
                                    <a href="{{ route('stores.create') }}" class="btn btn-primary">  Store  <i class="fa fa-plus"></i></a>
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
                                                <th class="border-bottom-0">Description</th>
                                                <th class="border-bottom-0"><i class="fa fa-cogs"></i></th>
											</tr>
										</thead>
										<tbody>
										@foreach ( $stores as  $store)
                                        {{-- @isset ($store->category->name) --}}
                                        <tr>
                                            <td class="">{{$loop->index+1}}</td>
                                            <td>{{$store->name}}</td>
                                                <th class="w-25 border-bottom-0"> {{$store->category->name}}</th>
                                                <th class="w-50 border-bottom-0"> <img alt="{{$store->name}}" class="rounded"  width="200px" height="150px"
                                                src="{{Storage::url($store->image)}}"></th>
                                            <th class="w-25 border-bottom-0">  @if (count($store->rating) > 0)
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
                                            <th class=" border-bottom-0">{{$store->desc}}</th>
                                            <td class="w-75">
                                                <form action="{{ route('stores.destroy', $store->id) }}" style="display: inline;"
                                                     method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger remove mt-2">
                                                        <i class="fa fa-trash"></i>
                                                </button>
                                                </form>
                                                <a href="{{ route('stores.edit',$store->id) }}" class="btn btn-primary mt-2"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        {{-- @endisset --}}
                                        @endforeach
										</tbody>
                                        {{$stores->links()}}
									</table>
                                    {{$stores->links()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection


@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

{{-- <script src="sweetalert2.min.js"></script> --}}

@endsection
