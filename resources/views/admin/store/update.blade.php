@extends('admin.layouts.master_layout')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
@endsection
@section('content')
				<div class="row">
					<div class="col-lg-12 col-md-12 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="mb-4">
                                  <form class="form-horizontal"  method="POST"  action="{{ route('stores.update', $store->id)}}"  enctype="multipart/form-data">
                                         @csrf
                                         @method('PUT')
                                         <div class="form-group">
                                        <h6 class="mb-1 mt-3">Store Name</h6>
                                         <input type="text" class="form-control" value="{{$store->name}}" name="name" id="inputName" placeholder="Name Store">
                                         <h6 class="mb-1 mt-3">Slect Category</h6>
                                         <select name="category_id" class="form-control SlectBox">
                                             @foreach ( $categories as  $category)
                                             <option  value="{{$category->id}}"  @if ($store->category_id == $category->id) selected   @else>{{$category->name}}</option>
                                             @endif
                                             @endforeach
                                         </select>
                                        </div>
                                           <div class="form-group">
                                            <h6 class="mb-1 mt-3">Store Desicription</h6>
                                            <input type="text" class="form-control" title="{{$store->desc}}" value="{{$store->desc}}" name="desc" id="inputName" placeholder="Desicription">
                                           </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Your Imgae</h6>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-4" >
                                            <img id="blah"    src="{{Storage::url($store->image)}}"
                                              alt="{{$store->image}}" class="rounded "  height="200px" />
                                               </div>
                                      </div>
                                        <div>
                                            <h6 class="mb-1">File Upload</h6>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-4" >
                                                <input type="file"name="image" title="Update"  id="imgInp"  data-height="140" />
                                            </div>
                                      </div>
                                           <button type="submit" class="btn btn-primary">Save</button>

                                </form>

						</div>
					</div>
				</div>
			</div>
			<!-- Container closed -->
		</div>
    </div>
</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>

<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection
