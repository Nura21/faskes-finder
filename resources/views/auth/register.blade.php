@extends('layouts.navigations.default')
@section('title', 'Disabi')
@section('body-class', 'hold-transition register-page')
@section('main')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url(request()->segment(1)) }}" class="h1"><b>Dis</b>abi</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ url(request()->segment(1)) }}" method="POST">
                    @csrf
                    @include('auth._register-form')
                </form>
                <a href="{{ url('/') }}" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div>
    </body>
@endsection
