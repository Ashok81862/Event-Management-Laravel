@extends('adminlte::page')

@section('title', 'Venue Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Venue Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.venues.edit', $venue->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.venues.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $venue->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $venue->name }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $venue->address }}</td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td>{{ $venue->longitude }}</td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td>{{ $venue->latitude }}</td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>
                        @if($venue->media_id)
                            <img src="/storage/{{ $venue->media->path }}" width="250px" height="250px">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $venue->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $venue->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
