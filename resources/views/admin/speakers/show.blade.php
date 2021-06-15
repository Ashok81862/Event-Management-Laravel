@extends('adminlte::page')

@section('title', 'Speaker Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Speaker Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.speakers.edit', $speaker->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.speakers.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $speaker->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $speaker->name }}</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $speaker->title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $speaker->body }}</td>
                </tr>
                <tr>
                    <td>Facebook Link</td>
                    <td>{{ $speaker->facebook }}</td>
                </tr>
                <tr>
                    <td>Instagram Link</td>
                    <td>{{ $speaker->instagram }}</td>
                </tr>
                <tr>
                    <td>Twitter Link</td>
                    <td>{{ $speaker->twitter }}</td>
                </tr>
                <tr>
                    <td>Email Id</td>
                    <td>{{ $speaker->email }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        @if($speaker->media_id)
                            <img src="/storage/{{ $speaker->media->path }}" width="150px" height="150px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $speaker->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $speaker->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
