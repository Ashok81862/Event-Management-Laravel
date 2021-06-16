@extends('adminlte::page')

@section('title', 'Update Hotel')


@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Update Hotel</h3>
            <div class="card-tools">
                <a href="{{ route('admin.hotels.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.hotels.update', $hotel->id) }}" enctype="multipart/form-data">
                @csrf   @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        name="name" id="name"
                        value="{{ old('name') ?? $hotel->name }}"
                        class="form-control @error('name') is-invalid @enderror"
                        autofocus
                    >
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input
                                type="text"
                                name="address" id="address"
                                value="{{ old('address') ?? $hotel->address }}"
                                class="form-control @error('address') is-invalid @enderror"
                            >
                            @error('address')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input
                                type="number"
                                name="rating" id="rating"
                                value="{{ old('rating') ?? $hotel->rating }}"
                                class="form-control @error('rating') is-invalid @enderror"
                            >
                            @error('rating')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea
                        name="body" id="body"
                        class="form-control @error('body') is-invalid @enderror"
                    >{{ old('body') ?? $hotel->body }}</textarea>
                    @error('body')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Hotel Picture</label>
                    <input
                        type="file"
                        name="image" id="image"
                        class="form-control-file @error('image') is-invalid @enderror"
                    >
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4 mb-1">
                    <input type="submit" class="btn btn-primary" value="Update Hotel">
                    <a href="{{ route('admin.hotels.index') }}" class="btn btn-link float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
