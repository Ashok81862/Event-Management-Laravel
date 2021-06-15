@extends('adminlte::page')

@section('title', 'All Amenities')

@section('content')

    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All amenities</h3>
            <div class="card-tools">
                <a href="{{ route('admin.amenities.create') }}" class="btn btn-sm btn-info">
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($amenities as $amenitie)
                    <tr>
                        <td>{{ $amenitie->id }}</td>
                        <td>{{ $amenitie->name }}</td>
                        <td>
                            <!-- Edit -->
                            <a href="{{ route('admin.amenities.edit', $amenitie->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $amenitie->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $amenitie->id }}" action="{{ route('admin.amenities.destroy', $amenitie->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($amenities->total() >10)
        <div class="card-footer">
            {{ $amenities->links() }}
        </div>
        @endif
    </div>
@stop
