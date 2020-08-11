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
            <label>Attachment</label>
            <input name="attachment" value="{{ $training->attachment }}" type="text" class="form-control" readonly>
            <!-- Display image if available-->
            @if ($training->attachment == null)
                <label>Image not available</label>
            @else
                {{-- Get File extension --}}
                @php
                    $file_ext = pathinfo(asset('/storage' .$training->attachment), PATHINFO_EXTENSION);
                @endphp

                {{-- Check file extension and view accordingly --}}
                @if ($file_ext == 'doc' || $file_ext == 'docx')
                    <div class="mt-2">
                        <a href="{{ asset('/storage/' .$training->attachment) }}">
                            {{ $training->attachment }}
                        </a>
                    </div>
                @elseif ($file_ext == 'pdf')
                    <div class="mt-2">
                        <a href="{{ asset('/storage/' .$training->attachment) }}">
                        <img src="{{ asset('/icon/icon-pdf.png') }}" width="100">
                            {{ $training->attachment }}
                        </a>
                    </div>
                @else
                    <div class="mt-2"><img src="{{ asset('/storage/' . $training->attachment) }}" width="300"></div>
                @endif

            @endif
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
