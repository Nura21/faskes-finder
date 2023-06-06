@extends('layouts.navigations.default')
@section('title', 'User')
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', 'User')
@section('menu', 'User')
@section('process', 'Read User')
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
                                <th>{{ __('user.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->password }}</td>
                                    <th>{{ $u->remember_token }}</th>
                                    <th>{{ $u->created_at }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
