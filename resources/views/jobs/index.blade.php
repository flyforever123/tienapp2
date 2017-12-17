@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">List All Jobs</div>
                 <div class="panel-body">
                    @foreach($jobs as $job)
                        <article>
                            <h4><a href="http://localhost/vlance/public/jobs/{{ $job->id }}">{{ $job->title }}</a></h4>
                            <p>{{ $job->creator->name }} - {{ $job->category->name }}</p>
                            <div class='body'>
                                {{ $job->body }}
                            </div>
                        </article>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection