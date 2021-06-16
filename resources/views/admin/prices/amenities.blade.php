@extends('adminlte::page')

@section('title', 'Prices Amenities')

@section('plugins.Select2', true)

@push('js')
<script>
    $(document).ready(function() {
        $('#amenity_id').select2();
    });
</script>
@endpush

@section('content')

    <x-delete />

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold" style="font-size:1.4rem">Price Amenities</h3>
            <div class="card-tools">
                <a href="{{ route('admin.prices.show', $price->id) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-fw fa-arrow-left mr-1"></i>
                    <span>Go Back</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prices.amenities.store', $price->id) }}" method="post">
                @csrf @method('PUT')


                <div class="form-group">
                    <label for="amenity_id">Choose Amenity</label>
                    <select
                        name="amenity_id" id="amenity_id"
                        class="form-control @error('amenity_id') is-invalid @enderror"
                    >
                        @foreach($amenities as $amenity)
                            <option value="{{ $amenity->id }}" @if(old('amenity_id') == $amenity->id) selected @endif>{{ $amenity->name }}</option>
                        @endforeach
                    </select>

                    @error('amenity_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Add Amenity">

            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Amenity Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($price->amenities as $amenity)
                    <tr>
                        <td>{{ $amenity->id }}</td>
                        <td>{{ $amenity->name }}</td>
                        <td>
                            <!-- Delete -->
                            <a href="#" onclick="confirmDelete({{ $amenity->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-fw fa-edit mr-1"></i>
                                <span>Delete</span>
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $amenity->id }}" action="{{ route('admin.prices.amenities.remove', $price->id) }}" method="post">
                                <input type="hidden" name="amenity_id" value="{{ $amenity->id }}">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
