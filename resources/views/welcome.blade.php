@extends('layout')

@section('content')

    <h1>Project Ideas</h1>
    <div class="all-projects">
        <div class="project-container">
            @foreach($projects as $project)
                <div class="project-content">
                    {!! $project !!}
                </div>
            @endforeach
        </div>
    </div>

@endsection
