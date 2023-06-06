@extends('layouts.navigations.default')
@section('title', __('user.user'))
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', __('user.user'))
@section('menu', __('user.user'))
@section('process', __('general.read').' '. __('user.user'))
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap table-responsive" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>{{ __('user.email') }}</th>
                                <th>{{ __('user.password') }}</th>
                                <th>{{ __('user.token') }}</th>
                                <th>{{ __('general.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <th>{{ $user->remember_token }}</th>
                                    <th>{{ $user->created_at }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
