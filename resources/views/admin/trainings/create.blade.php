@extends('admin.layouts.main')

@section('title', 'New Record')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Show validation error messages-->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
                <!-- input type=file -->
                <input type="file" name="attachment" .value"{{ old('attachment') }} class="form-control">
            </div>

            <!--Submit Button-->

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
