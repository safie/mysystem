@extends('admin.layouts.main')

@section('title', 'Edit Record')

@section('content')
<form action="{{route('training:update', $training->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-2">
        <label>Title</label>
        <input name="title" value="{{ old('title', $training->title)}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Description</label>
        <input name="description" value="{{ old('description', $training->description)}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Trainer</label>
        <input name="trainer" value="{{ old('trainer', $training->trainer)}}" type="text" class="form-control">
    </div>

    <div class="mt-2">
        <label>Attachment <small>(Upload image file only)</small></label>
        <!-- input type=file -->
        <input type="file" name="attachment" .value"{{ old('attachment') }} class="form-control">
    </div>

    <div class="mt-2">
        <label>Status</label>
        <div>
            <label><input name="status" value="1" {{ old('status', $training->status) == '1' ? 'checked' : '' }} type="radio">Active</label>
            <label><input name="status" value="0" {{ old('status', $training->status) == '0' ? 'checked' : '' }} type="radio">Inactive</label>
        </div>

    </div>

    <!--Submit Button-->

    <div class="mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
