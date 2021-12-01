@extends('web-layout')
@section('content')
				<!-- row -->
                <div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4>
						</div>
					</div>
				</div>
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active " id="pic-1"><img height="450px" src="{{Storage::url($store->image)}}" alt="image"/></div>
										</div>

									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{$store->name}}</h4>
										<p class="text-muted tx-13 mb-1">{{$store->category->name}}</p>


										<div class="rating mb-1">
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
											<span class="review-no">{{count($store->ratings)}} reviews</span>
										</div>
										<p class="product-description">{{$store->name}}</p>
                                                @if(count($store->ratings) > 0 )

                                                @foreach ($store->ratings as $ra )
                                                @if($ra->user_id == $_SERVER['REMOTE_ADDR'])
                                                    <form method="POST" action="{{ url('update') }}" >
                                                        @csrf
                                                        @method("PUT")
                                                     <div>
                                                         <div class="rate">
                                                        <input  type="radio" id="star5" name="rate" value="5"  @if (ceil($ra->rating) == 5)
                                                                checked
                                                        @endif/>
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input type="radio" id="star4" name="rate" value="4"  @if (ceil($ra->rating) == 4)
                                                        checked
                                                        @endif />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star3" name="rate" value="3" @if (ceil($ra->rating) == 3)
                                                        checked
                                                        @endif  />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star2" name="rate" value="2" @if (ceil($ra->rating) == 3)
                                                        checked
                                                            @endif />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star1" name="rate" value="1" @if (ceil($ra->rating) == 1)
                                                        checked
                                                        @endif />
                                                        <label for="star1" title="text">1 star</label>
                                                        <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                                        <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                                    </div>
                                                    <div class="action">
                                                        <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                                    </div>
                                                   </form>
                                                   @break
                                                   @endif
                                                   @if ($loop->index+1 == count($store->ratings))
                                                   <form method="POST" action="{{ route('index.store') }}" >
                                                    @csrf
                                                        <div class="rate">
                                                            <input  type="radio" id="star5" name="rate" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rate" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rate" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rate" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rate" value="1"/>
                                                            <label for="star1" title="text">1 star</label>
                                                            <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                                            <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                                        </div>
                                                        <div class="action">
                                                            <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                                        </div>
                                                   </form>
                                                   @endif
                                                   @endforeach
                                                @else
                                                <form method="POST" action="{{ route('index.store') }}" >
                                                    @csrf
                                                        <div class="rate">
                                                            <input  type="radio" id="star5" name="rate" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rate" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rate" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rate" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rate" value="1"/>
                                                            <label for="star1" title="text">1 star</label>
                                                            <input type="hidden" id="store_id" name="store_id" value="{{$store->id}}" />
                                                            <input type="hidden" name="userIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                                        </div>
                                                        <div class="action">
                                                            <button class="add-to-cart btn btn-success" type="submit">Send Rating</button>
                                                        </div>
                                                   </form>
                                                @endif
                                            </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					@foreach ($stores as $store )
                    <div class="col-lg-3">
						<div class="card item-card">
							<div class="card-body pb-0 h-100">
								<div class="text-center">
									<img src="{{Storage::url($store->image)}}" class="w-120" height="300px" alt="img" >
								</div>
								<div class="card-body cardbody relative">
									<div class="cardtitle">
                                        <div class="h6 mb-2 mt-2 font-weight-bold text-uppercase h-25"
                                        style=" overflow: hidden;
                                       max-width: 75ch;
                                       text-overflow: ellipsis;
                                       white-space: nowrap;
                                        " maxlength="20">
										<span>{{$store->category->name}}</span>
										<a>{{$store->name}}</a>
                                        </div>
									</div>
								</div>
							</div>
							<div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
								<a href="{{ route('index.index',["id"=>$store->id])}}" class="btn btn-primary"> View More</a>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
        @endsection
