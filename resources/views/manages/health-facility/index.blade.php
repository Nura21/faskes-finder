@extends('layouts.navigations.default')
@section('title', __('health_facility.name'))
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', __('health_facility.name'))
@section('menu', __('health_facility.name'))
@section('process', __('general.read') . ' ' . __('health_facility.name'))
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('health-facilities.create') }}">
                            <button class="btn bg-gradient-white">
                                {{ __('general.btn.crt') }}
                            </button>
                        </a>
                    </h3>
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
                                <th>{{ __('health_facility.name') }}</th>
                                <th>{{ __('health_facility.lat') }}</th>
                                <th>{{ __('health_facility.long') }}</th>
                                <th>{{ __('health_facility.status') }}</th>
                                <th>{{ __('general.created_at') }}</th>
                                <th>{{ __('general.act') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthFacilities as $health)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $health->name }}</td>
                                    <td>{{ $health->lat }}</td>
                                    <th>{{ $health->long }}</th>
                                    <th>{{ $health->status }}</th>
                                    <th>{{ $health->created_at }}</th>
                                    <th>
                                        <a href="{{ route('health-facilities.edit', $health->id) }}"
                                            class="btn btn-warning btn-xl" role="button">
                                            {{ __('general.btn.edit') }}
                                        </a>
                                        <form action="{{ route('health-facilities.destroy', $health->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">{{ __('general.btn.dlt') }}</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
