@extends('layouts.navigations.default')
@section('title', 'Faskes Finder')
@section('body-class', 'hold-transition login-page')
@section('main')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                @error('email')
                    {{ $message }}
                @else
                    @error('password')
                        {{ $message }}
                    @else
                        @if (Session::has('message'))
                            {{ session('message') }}
                        @else
                            <a href="{{ url(request()->segment(1)) }}" class="h1"><b>Faskes</b>&nbsp;Finder</a>
                        @endif
                    @enderror
                @enderror
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">{{ __('auth.login') }}</p> --}}

                <form action="{{ url('loginPost') }}" method="POST" id="loginForm">
                    @csrf
                    @include('auth._login-form')
                </form>
                {{-- <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p> --}}
                {{-- <p class="mb-0">
                    <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
        </div>
    </div>
@endsection
