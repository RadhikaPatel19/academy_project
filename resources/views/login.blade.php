@extends('app.app')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center align-item-center" style="min-height: 100vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb=0">Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{old ('email')}}" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="{{old ('password')}}" class="form-control">
                            @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">login</button>
                            <a href="{{url('forgot-password')}}" class="btn btn-link">Forgot Your Password </a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection