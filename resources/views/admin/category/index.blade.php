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
									<h4 class="card-title mg-b-0">Categories</h4>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                        Add Category &ThickSpace; &ThickSpace;
                                        <i class="fa fa-plus"></i>
                                     </button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0"><i class="fa fa-cogs"></i></th>
											</tr>
										</thead>
										<tbody>
										@foreach ( $categories as  $category)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <form action="{{ route('category.destroy', $category->id) }}" style="display: inline;"
                                                     method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger remove">
                                                        <i class="fa fa-trash"></i>
                                                </button>
                                                </form>
                                                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}">
                                                    <i class="fa fa-edit"></i></button>
                                            </td>
                                            <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body pt-0">
                                                            <form class="form-horizontal"  method="POST" action="{{ route('category.update', $category->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="name" value="{{$category->name}}" id="inputName" placeholder="Name Category">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                        </tr>
                                        @endforeach
										</tbody>
									</table>
                                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body pt-0">
                                                    <form class="form-horizontal"  method="POST" action="{{ route('category.store') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name" id="inputName" placeholder="Name Category">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
								</div>
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
