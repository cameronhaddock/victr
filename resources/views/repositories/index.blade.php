@extends('layouts.app')



@section('content')

    <h1>Repositories</h1>
    <div class="repo-list">
        @forelse($repos as $repo)
            <div class="repo">
                <div class="meta">
                    <a href="{{ route('repositories.show',['name'=>$repo->name]) }}"><h3 class="repo-name">{{ $repo->name }}</h3></a>
                    <p class="description">{{ $repo->description }}</p>
                    <div class="pin-bottom">
                        <p class="text-muted">updated {{ $repo->last_push_date_for_humans() }}</p>
                    </div>
                </div>
                <div class="stats">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="star-count">{{ $repo->stars }}</span>
                    </div>
                </div>
            </div>

            @empty
            <p>No result found in local database</p>
            Please goto The <a href="{{ route('repositories.fetch') }}">fetch</a> page to import from github
        @endforelse

    </div>
@endsection