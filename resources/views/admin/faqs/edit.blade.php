@extends('adminlte::page')

@section('title', 'Update FAQ')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Update FAQ</h3>
            <div class="card-tools">
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.faqs.update', $faq->id) }}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input
                            type="text"
                            name="question" id="question"
                            value="{{ old('question') ?? $faq->question }}"
                            class="form-control @error('question') is-invalid @enderror"
                            autofocus
                        >
                        @error('question')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea
                            name="answer" id="answer"
                            class="form-control @error('answer') is-invalid @enderror"
                            autofocus
                        >{{ old('answer') ?? $faq->answer }}</textarea>
                        @error('answer')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 mb-1">
                    <input type="submit" class="btn btn-primary" value="Update FAQ">
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-link float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop
