@extends('adminlte::page')

@section('title', 'Schedule Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Schedule Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.schedules.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $schedule->id }}</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $schedule->title }}</td>
                </tr>
                <tr>
                    <td>Sub Title</td>
                    <td>{{ $schedule->sub_title }}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>{{ $schedule->start_date }}</td>
                </tr>
                <tr>
                    <td>Speaker Name</td>
                    <td>{{ $schedule->speaker->name }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $schedule->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $schedule->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
