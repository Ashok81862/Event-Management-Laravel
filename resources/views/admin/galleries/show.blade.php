@extends('adminlte::page')

@section('title', 'Gallery Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Gallery Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $gallery->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $gallery->name }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        @if($gallery->media_id)
                            <img src="/storage/{{ $gallery->media->path }}" width="250px" height="150px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $gallery->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $gallery->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
