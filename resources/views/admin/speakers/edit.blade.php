@extends('adminlte::page')

@section('title', 'Update Speaker Information')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Update Speaker Information</h3>
            <div class="card-tools">
                <a href="{{ route('admin.speakers.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.speakers.update', $speaker->id) }}" enctype="multipart/form-data">
                @csrf  @method('PUT')

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name" id="name"
                                value="{{ old('name') ?? $speaker->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                autofocus
                            >
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                name="title" id="title"
                                value="{{ old('title') ?? $speaker->title }}"
                                class="form-control @error('title') is-invalid @enderror"
                            >
                            @error('title')
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
                    >{{ old('body') ?? $speaker->body }}</textarea>

                    @error('body')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input
                                type="text"
                                name="facebook" id="facebook"
                                value="{{ old('facebook') ?? $speaker->facebook }}"
                                class="form-control @error('facebook') is-invalid @enderror"
                            >
                            @error('facebook')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input
                                type="text"
                                name="instagram" id="instagram"
                                value="{{ old('instagram') ?? $speaker->instagram }}"
                                class="form-control @error('instagram') is-invalid @enderror"
                            >
                            @error('instagram')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input
                                type="text"
                                name="twitter" id="twitter"
                                value="{{ old('twitter') ?? $speaker->twitter }}"
                                class="form-control @error('twitter') is-invalid @enderror"
                            >
                            @error('twitter')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <input
                                type="text"
                                name="email" id="email"
                                value="{{ old('email') ?? $speaker->email }}"
                                class="form-control @error('email') is-invalid @enderror"
                            >
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Profile Picture</label>
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
                    <input type="submit" class="btn btn-primary" value="Add New speaker">
                    <a href="{{ route('admin.speakers.index') }}" class="btn btn-link float-right">Cancel</a>
                </div>


            </form>
        </div>
    </div>
@stop
