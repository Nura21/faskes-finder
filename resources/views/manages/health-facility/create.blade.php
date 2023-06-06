@extends('layouts.navigations.default')
@section('title', 'Penjualan User')
@section('body-class', 'hold-transition sidebar-mini')
@section('main-menu', 'User')
@section('menu', 'User')
@section('process', 'Create User')
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
                    <form action="{{ url('users') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                required>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username"
                                class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                required>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"
                                required>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-dark">Create</button>
                        </div>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @endsection
