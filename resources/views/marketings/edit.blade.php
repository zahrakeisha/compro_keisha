@extends('template/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data marketing</h3>
            </div>
            <form action="{{ route('marketing.update', $marketings->marketing_id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$marketings->image}}"required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{$marketings->image}}"required>
                </div>
                <div class="mb-3">
                    <label for="possition" class="form-label">Possition</label>
                    <input type="text" name="possition" id="possition" class="form-control" value="{{$marketings->image}}"required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Update</button>
                <a href="{{ route('marketing.index') }}" class="btn btn-secondary btn-block">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection



  