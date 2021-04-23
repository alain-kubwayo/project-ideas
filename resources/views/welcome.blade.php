@extends('layout')

@section('content')

    <h1>Project Ideas</h1>
    <div class="all-projects">
            @foreach($projects as $project)
                <div class="project-content">
                    <h2>{{$project->name}}</h2>
                    <p>{{$project->desc}}</p>
                    <a href="/projects/{{$project->slug}}">View Full Details</a>
                </div>
            @endforeach
    </div>

@endsection
