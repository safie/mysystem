@extends('admin.layouts.main')

@section('title', 'Senarai Training')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="float-left">
            <a class="btn btn-success btn-sm" href="{{ action('TrainingController@create') }}"> New Record</a>
        </div>
        <div class="float-right">
            <form class="form-inline" method="GET" action="{{ route('training:index') }}">
                <input type="text" name="keyword" class="form-control">
                <button type="submit" class="btn btn-primary" title="Search Training">
                    <i class="fa fa-search"> </i>
                </button>
            </form>
        </div>

        @if (session()->has('alert'))
            <div class="alert alert-{{ session()->get('alert-type') }}">
                {{ session()->get('alert') }}
            </div>
        @endif

        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Trainer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainings as $training)
                    <tr>
                        <td>{{ $training->id }} </td>
                        <td>{{ $training->title }} </td>
                        <td>{{ $training->trainer }} </td>
                        <td>
                            <!--Button View -->
                            <a class="btn btn-success btn-sm mt-2" href="{{ action('TrainingController@show', $training->id) }}" >
                                <i class="fa fa-list-alt"></i> View
                            </a>
                            <!--Button Edit -->
                            <a class="btn btn-warning btn-sm mt-2" href="{{ action('TrainingController@edit', $training->id) }}" >
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <!--Button Delete -->
                            <form method="POST" action="{{ action('TrainingController@destroy', $training->id) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm mt-2"
                                    onclick="return confirm('Are your sure to delete record is:{{ $training->id }}')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $trainings->links() }} --}}
        {{ $trainings->appends(['keyword'=>request()->get('keyword')])->links() }}

    </div>
</div>

@endsection
