@extends('adminlte::page')

@section('title', 'All Venues')

@section('content')

    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Venues</h3>
            <div class="card-tools">
                <a href="{{ route('admin.venues.create') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-plus-circle mr-1"></i>
                    <span>Add New</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0 border-top-0">
            <table class="table table-bordered border-top-0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venues as $venue)
                    <tr>
                        <td>{{ $venue->id }}</td>
                        <td class='text-center'>
                            @if($venue->media_id)
                                <img src="/storage/{{ $venue->media->path }}" height="30px">
                            @endif
                        </td>
                        <td>{{ $venue->name }}</td>
                        <td>{{ $venue->address }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.venues.show', $venue->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.venues.edit', $venue->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $venue->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $venue->id }}" action="{{ route('admin.venues.destroy', $venue->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($venues->total() >10)
        <div class="card-footer">
            {{ $venues->links() }}
        </div>
        @endif
    </div>
@stop
