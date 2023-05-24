@extends('layouts.navigations.default')
@section('title', 'Dashboard')
@section('body-class', 'hold-transition sidebar-mini layout-fixed')
@section('main-menu', 'Dashboard')
@section('menu', 'Dashboard')
@section('process', 'List')
@section('main')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users ? $users : '-'}}</h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $healths ? $healths : '-' }}</h3>

                    <p>Health Faculty</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
