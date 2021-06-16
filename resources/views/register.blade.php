<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('head')
<body style="background-image:  linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.73)), url('{{ asset('assets/images/image3456.jpg')}}'); background-size: cover; "  >
<div class="main-wrapper "  >
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" >

        <div class="auth-box row shadow-lg" style="background-color: white; border-radius: 30px; box-shadow: #0d141d">


            <div class="row m-auto">
                <div class="m-3 pl-lg-5">

                    <h3 class="page-title text-truncate font-weight-light mb-3 align-content-center">  <i data-feather="lock" class="feather-icon"></i> Sign Up  </h3>
                </div>
                <form  action="{{route('re_create')}}" method="post">
                    @csrf

                    <div class="results">
                        @if(\Illuminate\Support\Facades\Session::get('success'))
                            <div class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::get('success')}}
                            </div>
                        @endif


                        @if(\Illuminate\Support\Facades\Session::get('fails'))
                            <div class="alert alert-danger">
                                {{\Illuminate\Support\Facades\Session::get('fails')}}
                            </div>
                        @endif
                    </div>

                    <div class=" ">
                        <label class=" text-dark font-weight-medium">  Name</label>

                            <input class="form-control form-control-lg "  type="text" name="name" placeholder="Name" style="border-radius: 5px">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>


                    </div>
                    <div class=" ">
                        <label class=" text-dark font-weight-medium">  Email </label>

                            <input class="form-control form-control-lg "  type="text" name="email" placeholder="Email" style="border-radius: 5px">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>


                    </div>

                    <div class="mb-3" >
                        <label for="password">Password: </label>
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Password">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>


                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            Register
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




