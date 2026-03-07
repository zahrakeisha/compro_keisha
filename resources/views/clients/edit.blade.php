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
                    <label>Name</label>
                    <input type="text" name="name" value="{{$clients->name}}">
                </div>
                <div class="mb-3">
                    <label>Logo</label>
                    <input type="file" name="logo" value="{{$clients->logo}}">
                </div>
                <div class="mb-3">
                    <label>Services Category</label>
                    <select name="service_id">
                        <option value="">-- Choose Service --</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->service_id }}" {{ $service->service_id ==
                            $clients->service_id ? 'selected' : ''}}>{{$service->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description">{{$clients->description}}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

