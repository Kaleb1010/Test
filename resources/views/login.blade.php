<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('head')
<body style="background-image:  linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.73)), url('{{ asset('assets/images/image3456.jpg')}}'); background-size: cover; "  >
<div class="main-wrapper "  >
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" >

        <div class="auth-box row shadow-lg" style="background-color: white; border-radius: 30px; box-shadow: #0d141d">


            <div class="col m-4 " >
                <div class="row">
                    <div class="pl-lg-5">

                        <h3 class="page-title text-truncate font-weight-light mb-1">  <i data-feather="lock" class="feather-icon"></i> Sign In  </h3>
                        <br>
                    </div>
                </div>
                <form  action="{{route('check')}}" method="post">
                    @csrf

                    <div class="results">
                        @if(\Illuminate\Support\Facades\Session::get('fails'))
                            <div class="alert alert-danger">
                                {{\Illuminate\Support\Facades\Session::get('fails')}}
                            </div>
                        @endif
                    </div>
                    <div class=" ">
                        <label class=" text-dark font-weight-medium">  Username

                            <input class="form-control form-control-lg "  type="text" name="email" placeholder="Username" style="border-radius: 5px">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>

                        </label>
                    </div>
                    <div class="mt-3" >
                        <label class=" text-dark font-weight-medium"> Password
                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" style="border-radius: 5px">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>

                        </label>
                    </div>
                    <div class="mt-3 mb-3 ">
                        <button type="submit" class="btn btn-block btn-lg btn-outline-success shadow" style="border-radius: 10px">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            @if(\Illuminate\Support\Facades\Session::get('warning'))
                <div class="alert alert-warning_change">
                    <script>
                        swal("Nope! You are not authorized to access this page!", {
                            icon: "warning",
                        });
                    </script>
                </div>
            @endif

        </div>
    </div>
</div>

@include('script')
</body>
</html>
