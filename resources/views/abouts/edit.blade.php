@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit Data about us</h3>
            </div>
            <form action="{{ route('about.update', $abouts->about_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-tabel">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-tabel">Direktur Utama</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-tabel">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-tabel">Structure Organization</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

