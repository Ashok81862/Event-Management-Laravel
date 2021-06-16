@extends('adminlte::page')

@section('title', 'Hotel Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Hotel Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.hotels.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $hotel->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $hotel->name }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $hotel->address }}</td>
                </tr>
                <tr>
                    <td>Rating</td>
                    <td>{{ $hotel->rating }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        @if($hotel->media_id)
                            <img src="/storage/{{ $hotel->media->path }}" width="250px" height="250px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $hotel->body }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $hotel->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $hotel->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
