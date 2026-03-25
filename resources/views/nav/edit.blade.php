@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Nav Profile</h3>
            </div>
            <form action="{{ route('nav.update', $dataeditnav->nav_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Company Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$dataeditnav->company_name}}"required>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="form-group">
                        @if($dataeditnav->logo)
                        <label for="logo" class="form-label">Preview Photo</label>
                        <img src="{{ asset('storage/' . $dataeditnav->logo) }}"
                            alt="{{ $dataeditnav->name }}" class="img-thumbnail" width="200"></p>
                        @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
                <a href="{{ route('nav.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            
            </form>
        </div>
    </div>
</div>
@endsection    
