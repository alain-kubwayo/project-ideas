@extends('layout')

@section('content')
    <h1>Project Idea</h1>
    <div class="all-projects">
        <div class="project-container">
            <div class="project-content">
                {!!$project!!}
            </div>
        </div>
    </div>
@endsection
