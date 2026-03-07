@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data about us</h3>
            </div>
            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-tabel">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-tabel">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-tabel">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-tabel">image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-tabel">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-tabel">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-tabel">Phone number</label>
                    <input type="text" name="telpon" id="telpon" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="maps" class="form-tabel">Maps</label>
                    <input type="text" name="maps" id="maps" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
