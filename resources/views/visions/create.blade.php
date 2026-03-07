@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Data Visions&Missios</h3>
            </div>
            <form action="{{ route('visions.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="type">Type</label>
                    <select name="type" id="type" class="form-control" id="type">
                        <option value="">Choose Type</option>
                        <option value="vision">Vision</option>
                        <option value="mission">Missions</option>
                    </select>
                </div>
                <div class="mb-3">
                     <label class="form-label" for="content">Content</label>
                     <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                    <a href="{{ route('visions.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection




    
   
