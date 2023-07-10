@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-center">Project</h1>
    <div class="container">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $project->date }}</li>
                    <li class="list-group-item">{{ $project->name }}</li>
                    <li class="list-group-item">{{ $project->surname }}</li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-primary"
                        href="{{ route('admin.projects.show', ['project' => $project->id]) }}">VIEW</a>
                </div>
            </div>
        </div>
    </div>
@endsection
