@extends('layouts.app')

@section('title')
   Sign In
@stop

@section('styles')
 <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 200;
 
        }
        
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 300;
            font-size: 72px;
        }
        
        h4 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 300;
            font-size: 32px;
        }
        
        .signinform {
            border: thin #c4c4c4 solid;
            border-radius: 1% 1% 1% 1%;
        }
        
        a {
            color: #000;
        }
        
        a:hover {
            text-decoration: none;
            color: #000;
        }

        
        .btn-success {
            background-color: #0ABAB5;
            border: thin #0ABAB5 solid;
        }
        
        .btn-success:hover {
            background-color: #0ABAB5;
            border: thin #0ABAB5 solid;
        }


        form#loginform button{
            background:#0ABAB5;
            border:0px
        }

         div.floatright a, div.floatright p{
             font-size: 16px;
         }

        .error{
            background-color: red;
        }

    </style>
@endsection



@section('content')
     <div class="container">
        <div class="clearfix mt-3">
            <div class="float-left">
                <a href="" class="navbar-brand"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570531368/Lancers_evgrmc.png" alt="logo"></a>
            </div>
            <div class="float-right">

            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-md-6">
                <h1>Welcome Back!</h1>
            </div>
            <div class="col-md-5 offset-md-1 signinform mt-5 pl-5 pr-5 pt-4 pb-4">
                <h4 class="text-center">Sign In</h4>
                <form id="loginform" method="POST" action="{{ route('login') }}">
                 @csrf
                    <div class="form-group">
                        <label for="my-email">Email Address</label>
                        <input id="email" placeholder="eg. johndoe@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span  id="emessage"></span>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="my-password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                       
                        <span id="pmessage"></span>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="clearfix">
                        <div class="float-left">

                        </div>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success col-md-12 pt-2 pb-2 mt-2 mb-2">Login</button>
                    <div class="clearfix">
                        <div class="float-left">

                        </div>
                        <div class="float-right">
                            <p>Don't have an account? <a href="{{ url('/register') }}">Sign Up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


