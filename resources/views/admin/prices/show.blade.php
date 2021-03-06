@extends('adminlte::page')

@section('title', 'Price Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Price Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.prices.amenities', $price->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-plus mr-1"></i>
                    <span>Add Amenity</span>
                </a>

                <a href="{{ route('admin.prices.edit', $price->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.prices.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $price->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $price->name }}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>${{ $price->price }}</td>
                </tr>
                <tr>
                    <td>Amenities</td>
                    <td>
                        <ul>
                            @foreach ($price->amenities as $amenity)
                                <li>{{ $amenity->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $price->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $price->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
