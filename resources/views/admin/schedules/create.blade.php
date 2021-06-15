@extends('adminlte::page')

@section('title', 'Add New Schedule')

@section('plugins.Select2', true)

@push('js')
<script>
    $(document).ready(function() {
        $('#speaker_id').select2();
    });
</script>
@endpush

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Add New Schedule</h3>
            <div class="card-tools">
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.schedules.store') }}">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                name="title" id="title"
                                value="{{ old('title') ?? '' }}"
                                class="form-control @error('title') is-invalid @enderror"
                                autofocus
                            >
                            @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input
                                type="text"
                                name="sub_title" id="sub_title"
                                value="{{ old('sub_title') ?? '' }}"
                                class="form-control @error('sub_title') is-invalid @enderror"
                            >
                            @error('sub_title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input
                            type="date"
                            name="start_date" id="start_date"
                            value="{{ old('start_date') ?? '' }}"
                            class="form-control @error('start_date') is-invalid @enderror"
                        >
                        @error('start_date')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="speaker_id">Speaker Name</label>
                        <select
                            name="speaker_id"
                            id="speaker_id"
                            class="form-control @error('speaker_id') is-invalid @enderror">
                            <option value="">--Select Speaker --</option>
                                @foreach ($speakers as $speaker )
                                    <option value="{{$speaker->id}}"
                                        @if(old('speaker_id') == $speaker->id) selected @endif@enderror
                                    >{{ $speaker->name }}</option>
                                @endforeach
                        </select>
                        @error('speaker_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 mb-1">
                    <input type="submit" class="btn btn-primary" value="Add New schedule">
                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-link float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
