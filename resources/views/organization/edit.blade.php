@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>edit organization</h3>
            </div>
            <form action="{{ route('organization.update',$organization->org_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label>image</label>
                    <input type="file" name="image" value="{{$organization->image}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
                <a href="{{ route('organization.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

    
</form>