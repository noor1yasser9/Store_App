@extends('admin.layouts.auth_layout')
@section('title')
@stop

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    {{-- <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container">
        <div  class="mt-5 bg-white p-5">
            <div class="row">
                <div class="col-md-12 col-lg-10 col-xl-12 mx-auto">
                    <div class="card-sigin">
                        <div class="card-sigin">
                            <div class="main-signup-header">
                                <div class="text-center">
                                    <h2>مرحبا بك</h2>
                                    <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>البريد الالكتروني</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>كلمة المرور</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-main-primary btn-block">
                                       تسجيل الدخول
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
