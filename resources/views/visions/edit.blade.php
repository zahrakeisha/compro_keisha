@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data Visions&Missios</h3>
            </div>
            <form action="{{ route('visions.update', $visions_missions->vs_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Choose Type</option>
                        <option value="vision">Vision</option>
                        <option value="mission">Missions</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
                <a href="{{ route('visions.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection




    
    
    
    
