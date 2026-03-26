@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Footer Profile</h3>
            </div>
            <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" name="description" id="name" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="youtube" class="form-label">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="{{ route('footer.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            
            </form>
        </div>
    </div>
</div>
@endsection    
