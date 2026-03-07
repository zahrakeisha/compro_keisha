@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Organization</h3>
            </div>
            <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
                <a href="{{ route('organization.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection    
