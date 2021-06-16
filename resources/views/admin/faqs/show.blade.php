@extends('adminlte::page')

@section('title', 'FAQs Details')

@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">FAQ Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-edit mr-1"></i>
                    <span>Edit</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $faq->id }}</td>
                </tr>
                <tr>
                    <td>Question</td>
                    <td>{{ $faq->question }}</td>
                </tr>
                <tr>
                    <td>Answer</td>
                    <td>{{ $faq->answer }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $faq->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $faq->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop
