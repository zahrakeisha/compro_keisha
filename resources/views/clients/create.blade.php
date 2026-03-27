@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data clients</h3>
            </div>
            <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo"class="form-control form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Services Category</label>
                    <select name="service_id" id="category" class="form-control @error('service_id') is-invalid @enderror">
                        <option value="">-- Choose Service --</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->service_id }}" {{ old('service_id') == $service->service_id ? 'selected' : '' }}>
                            {{ $service->title}}
                        </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                <a href="{{ route('client.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
