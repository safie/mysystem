@extends('admin.layouts.main')

@section('title', 'Record')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="mt-2">
            <label>Title</label>
            <input name="title" value="{{ $training->title }}" type="text" class="form-control">
        </div>

        <div class="mt-2">
            <label>Description</label>
            <input name="description" value="{{ $training->description }}" type="text" class="form-control">
        </div>

        <div class="mt-2">
            <label>Trainer</label>
            <input name="trainer" value="{{ $training->trainer }}" type="text" class="form-control">
        </div>

        <div class="mt-2">
            <label>Submitted</label>
            <input name="user_id" value="{{ $training->user->name }}" type="text" class="form-control" readonly>
        </div>

        <div class="mt-2">
            <label>Status</label>
            <input name="status" value="{{ $training->status == '1' ? 'Active' : 'Inactive' }}" type="text" class="form-control" readonly>
        </div>

        <!--Submit Button-->

        <div class="mt-2">
            <a href="{{ route('training:index') }}" class="btn btn-primary">Back</a>
            <a href="{{ route('training:edit', $training->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

@endsection
