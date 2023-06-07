@extends('layouts.navigations.default')
@section('title', __('health_facility.name'))
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', __('health_facility.name'))
@section('menu', __('health_facility.name'))
@section('process', __('general.btn.crt').' '.__('health_facility.name'))
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('health-facilities.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('health_facility.name') }}</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lat">{{ __('health_facility.lat') }}</label>
                            <input type="text" id="lat" name="lat"
                                class="form-control @error('lat') is-invalid @enderror" value="{{ old('lat') }}"
                                required>
                            @error('lat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="long">{{ __('health_facility.long') }}</label>
                            <input type="long" id="long" name="long"
                                class="form-control @error('long') is-invalid @enderror" value="{{ old('long') }}"
                                required>
                            @error('long')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-dark">{{ __('general.btn.crt') }}</button>
                        </div>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @endsection
