@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit Data clients</h3>
            </div>
            <form action="{{ route('client.update', $clients->clients_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$clients->name}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control @error('name') is-invalid @enderror" value="{{$clients->logo}}">
                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                        @if($clients->logo)
                        <label for="logo" class="form-label">Preview Photo</label>
                        <img src="{{ asset('storage/' . $clients->logo) }}"
                            alt="{{ $clients->name }}" class="img-thumbnail" width="200"></p>
                        @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Services Category</label>
                    <select name="service_id" class="form-control @error('service_id') is-invalid @enderror">
                        <option value="">-- Choose Service --</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->service_id }}" {{ $service->service_id ==
                            $clients->service_id ? 'selected' : ''}}>{{$service->title}}
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
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{$clients->description}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="{{ route('client.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

