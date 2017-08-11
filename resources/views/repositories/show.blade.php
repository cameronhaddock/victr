@extends('layouts.app')



@section('content')
    <div class="repository-details">
        <h1 class="text-center repo-name">{{ $repo->name }} ( Owner: {{ $repo->owner }})</h1>
        <p class="text-center">
            {{ $repo->description }}
        </p>

        <h2 class="text-center">Repository details:</h2>
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="repo-detail">
                    <h4><strong>Repository ID:</strong></h4>
                    <p>{{ $repo->repository_id }}</p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="repo-detail">
                    <h4><strong>Github URL:</strong></h4>
                    <p><a href="{{ $repo->url }}"></a>{{ $repo->url }}</p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="repo-detail">
                    <h4><strong>Created</strong></h4>
                    <p>{{ $repo->created }} ( {{ $repo->creted_date_for_humans() }} )</p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="repo-detail">
                    <h4><strong>Last Push date:</strong></h4>
                    <p>{{ $repo->last_push }} ( {{ $repo->last_push_date_for_humans() }} )</p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="repo-detail">
                    <h4><strong>Number of stars</strong></h4>
                    <p>{{ $repo->stars }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection