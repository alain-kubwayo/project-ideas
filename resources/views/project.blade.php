@extends('layout')

@section('content')
    <h1 style="text-align: left">Project Idea</h1>
    <div class="project-container">
        <h2>{{$project->name}}</h2>
        <p>{{$project->body}}</p>
        <div>
            <a href="/projects"><--All Project Ideas</a>
        </div>
    </div>
@endsection
