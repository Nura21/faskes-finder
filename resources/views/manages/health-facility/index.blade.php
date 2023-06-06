@extends('layouts.navigations.default')
@section('title', __('health_facility.name'))
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', __('health_facility.name'))
@section('menu', __('health_facility.name'))
@section('process', __('general.read').' '.__('health_facility.name'))
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
                                <th>{{ __('health_facility.name') }}</th>
                                <th>{{ __('health_facility.lat') }}</th>
                                <th>{{ __('health_facility.long') }}</th>
                                <th>{{ __('general.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthFacilities as $health)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $health->name }}</td>
                                    <td>{{ $health->lat }}</td>
                                    <th>{{ $health->long }}</th>
                                    <th>{{ $health->created_at }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
