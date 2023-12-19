<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" href="{{asset('staradmin/assets/images/favicon.png')}}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('staradmin/assets/images/logo.svg')}}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light mb-3">Sign in to continue.</h6>
              <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" id="email"
                    placeholder="Email">
                    @error('email')
                      <div class="my-2 text-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="password"
                    placeholder="Password">
                    @error('password')
                      <div class="my-2 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  {{-- <a href="#" class="auth-link text-black">Forgot password?</a> --}}
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- endinject -->
</body>

</html>
