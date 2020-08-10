@extends('admin.layouts.main')

@section('title', 'New Record')

@section('content')
<form action="{{route('training:store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-2">
        <label>Title</label>
        <input name="title" value="{{ old('title')}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Description</label>
        <input name="description" value="{{ old('description')}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Trainer</label>
        <input name="trainer" value="{{ old('trainer')}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Attachment <small>(Upload image file only)</small></label>
    </div>

    <!--Submit Button-->

    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
