@extends('adminlte::page')

@section('title', 'Sponsor Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Sponsor Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.sponsors.edit', $sponsor->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.sponsors.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $sponsor->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $sponsor->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $sponsor->email }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        @if($sponsor->media_id)
                            <img src="/storage/{{ $sponsor->media->path }}" width="250px" height="250px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $sponsor->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $sponsor->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
