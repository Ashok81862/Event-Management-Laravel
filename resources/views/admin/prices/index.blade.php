@extends('adminlte::page')

@section('title', 'All Prices')

@section('content')


    <x-alert />
    <x-delete />

    <div class="card">
        <div class="card-header border-bottom-0">
            <h3 class="card-title text-bold" style="font-size:1.4rem">All Prices</h3>
            <div class="card-tools">
                <a href="{{ route('admin.prices.create') }}" class="btn btn-sm btn-info">
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
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                    <tr>
                        <td>{{ $price->id }}</td>
                        <td>{{ $price->name }}</td>
                        <td>{{ $price->price }}</td>
                        <td>
                            <!-- Show -->
                            <a href="{{ route('admin.prices.show', $price->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-fw fa-eye mr-1"></i>
                                <span>Details</span>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('admin.prices.edit', $price->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Edit</span>
                            </a>

                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $price->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $price->id }}" action="{{ route('admin.prices.destroy', $price->id) }}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($prices->total() >10)
        <div class="card-footer">
            {{ $prices->links() }}
        </div>
        @endif
    </div>
@stop
