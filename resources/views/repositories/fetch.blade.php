@extends('layouts.app')



@section('content')
    <div class="fetch-wrapper">
        <h1>Fetch Repositories from Github</h1>
        <form action="{{ route('repositories.save') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group col-sm-3">
                <input class="form-control" type="text" placeholder="Pages to fetch" name="count" value="1">
                <span>Each page contains 30 repositories</span>
            </div>
            <input class="btn btn-primary" type="submit" value="Fetch">
        </form>
    </div>
@endsection