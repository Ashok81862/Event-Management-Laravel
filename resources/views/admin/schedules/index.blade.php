@extends('adminlte::page')

@section('title', 'All Schedules')

@section('content')

    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Schedules</h3>
            <div class="card-tools">
                <a href="{{ route('admin.schedules.create') }}" class="btn btn-sm btn-info">
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
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>Speaker</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $scheduler)
                    <tr>
                        <td>{{ $scheduler->id }}</td>
                        <td>{{ $scheduler->title }}</td>
                        <td>{{ $scheduler->start_date }}</td>
                        <td>{{ $scheduler->speaker->name }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.schedules.show', $scheduler->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.schedules.edit', $scheduler->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $scheduler->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $scheduler->id }}" action="{{ route('admin.schedules.destroy', $scheduler->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($schedules->total() >10)
        <div class="card-footer">
            {{ $schedules->links() }}
        </div>
        @endif
    </div>
@stop
