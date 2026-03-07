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
                    <label for="name" class="form-tabel">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-tabel">Logo</label>
                    <input type="file" name="logo" id="logo"class="form-control">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-tabel">Services Category</label>
                    <select name="service_id" id="category" class="form-control">
                        <option value="">-- Choose Service --</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->service_id }}">
                            {{ $service->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-tabel">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection




    
    <br>
    
    <br>
    
    <br>
    
    <br>
    
