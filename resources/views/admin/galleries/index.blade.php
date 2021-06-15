@extends('adminlte::page')

@section('title', 'All Galleries')

@section('content')

    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Galleries</h3>
            <div class="card-tools">
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-info">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->id }}</td>
                        <td class='text-center'>
                            @if($gallery->media_id)
                                <img src="/storage/{{ $gallery->media->path }}" height="30px">
                            @endif
                        </td>
                        <td>{{ $gallery->name }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.galleries.show', $gallery->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $gallery->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($galleries->total() >10)
        <div class="card-footer">
            {{ $galleries->links() }}
        </div>
        @endif
    </div>
@stop
