@extends('web-layout')
@section('content')
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex ">
                    <h4 class="content-title mb-0 my-auto">Stores</h4>
                </div>
            </div>
        </div>
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
						<div class="card">
							<div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
							<div class="card-body pb-0">
								<div class="form-group">
                                    <form action="{{route("index.index")}}" method="GET">
                                        @csrf
                                    <select name="category_search" id="select-beast" class="form-control nice-select"  onchange="this.form.submit()">
                                        <option  selected  value="-1">Categories</option>
                                        @foreach ( $categories as  $category)
                                        <option  value="{{$category->id}}" @if($category_search  == $category->id) selected
                                        @endif>{{$category->name}}</option>
                                        @endforeach
									</select>
                                    <form action="{{route("index.index")}}" method="GET">
								</div>

							</div>

							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Rating</div>
							<div class="py-2 px-3">
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-12">
						<div class="card">
							<div class="card-body p-2">
									<form action="{{route("index.index")}}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                        <input type="text" class="form-control" name="search" @isset($search)
                                        value="{{$search}}"
                                        @endisset placeholder="Search ...">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                    </form>
							</div>
						</div>
						<div class="row row-sm">
                            @foreach ( $stores as  $store)

							<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                                <a href="{{ route('index.index',["id"=>$store->id]) }}" class="text-dark">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-pink">New</div>
											</div>
											<img class="w-100" height="300px" src="{{Storage::url($store->image)}}" alt="product-image">
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase h-25"
                                            style=" overflow: hidden;
                                            max-width: 75ch;
                                            text-overflow: ellipsis;
                                            white-space: nowrap;
                                             " maxlength="20">{{$store->name}}</h3>
                                             <h3 class="h6 mb-2 mt-2 font-weight-bold text-uppercase h-25"
                                              style=" overflow: hidden;
                                             max-width: 75ch;
                                             text-overflow: ellipsis;
                                             white-space: nowrap;
                                              " maxlength="20">{{$store->category->name}}</h3>
                                                @if (count($store->rating) > 0)
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
                                                @endif

										</div>
									</div>
								</div>
                            </a>
							</div>
                            @endforeach
						</div>
                        {{$stores->links()}}
						</div>
					</div>
				</div>

        @endsection
