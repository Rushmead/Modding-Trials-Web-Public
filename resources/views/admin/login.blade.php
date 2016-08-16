@extends('layouts.layout')

@section('title', 'Admin - Login')

@section('content')
    <div class="container">
        <center>
            <h3>Please enter the admin password</h3>
                <form action="/admin/login" method="POST">
                    <input type="password" name="password" placeholder="Admin Password" class="form-control shortInput">
                    <button type="submit" class="btn btn-success">Login</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </center>
    </div>
    <!-- /.container -->
@endsection