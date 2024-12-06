@extends('app.app')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center align-item-center" style="min-height: 100vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb=0">Register</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{old ('name')}}" class="form-control">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br>
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
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            <a href="{{url('forgot-password')}}" class="btn btn-link">Forgot Your Password </a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection