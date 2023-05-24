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
                    <a class="btn btn-light" style="color:black;">
                        <h3 class="card-title">Create</h3>
                    </a>

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
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <a href="{{ url('users/' . $u->id . '/edit') }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ url('users/' . $u->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
