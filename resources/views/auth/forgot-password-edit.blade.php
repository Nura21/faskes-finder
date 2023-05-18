@extends('layouts.navigations.default')
@section('title', 'Disabi')
@section('body-class', 'hold-transition register-page')
@section('main')
    <div class="register-box">
        <div class="card card-outline card-primary" style="border-color: green;">
            <div class="card-header text-center">
                <a href="#" class="h1">Iuran <b>Sampah</b></a>
            </div>
            <div class="card-body">
                <div class="register-box">
                    <div class="card-body">
                        @include('auth._forgot-password-password')
                        @include('auth._forgot-password-back')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
