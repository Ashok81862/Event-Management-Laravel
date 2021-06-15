@extends('adminlte::page')

@section('title', 'All Sponsors')

@section('content')

    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Sponsors</h3>
            <div class="card-tools">
                <a href="{{ route('admin.sponsors.create') }}" class="btn btn-sm btn-info">
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
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sponsors as $sponsor)
                    <tr>
                        <td>{{ $sponsor->id }}</td>
                        <td class='text-center'>
                            @if($sponsor->media_id)
                                <img src="/storage/{{ $sponsor->media->path }}" height="30px">
                            @endif
                        </td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->email }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.sponsors.show', $sponsor->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.sponsors.edit', $sponsor->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $sponsor->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $sponsor->id }}" action="{{ route('admin.sponsors.destroy', $sponsor->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($sponsors->total() >10)
        <div class="card-footer">
            {{ $sponsors->links() }}
        </div>
        @endif
    </div>
@stop
