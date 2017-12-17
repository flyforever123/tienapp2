@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $job->title }}     
                </div>
                <div class="panel-body">
                    @if(auth()->check())
                        {{ $job->body }}
                    @else
                        <p>Please <a href="{{ route("login") }}">sign in</a> to view this job</p>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                @if(auth()->check())
                    <div class="panel-heading">Add you bid</div>
                    <div class="panel-body">
                        <form method="POST" action="http://localhost/vlance/public/jobs/{{ $job->id }}/new_bid">
                            {{ csrf_field() }}
                            <div class='form-group'>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Bid Title">
                            </div>
                            <div class="form-group">
                                <input type="text" name="time" class="form-control" id="time" placeholder="Time to complete">
                            </div>
                            <div class='form-group'>
                                <textarea name='body' id='body' class='form-control' placeholder='Bid Description' rows='5'></textarea>
                            </div>
                            <div class='form-group'>
                                <input type="number" name="cost" class="form-control" id="cost" placeholder="Total Cost">
                            </div>
                            <button type='submit' class='btn btn-default'>Submit Bid</button>
                        </form>
                    </div>
                @else
                    <div class="panel-heading">Please <a href="{{ route("login") }}">sign in</a> to add new bid</div>
                @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">All Bids</div>
                    @foreach($job->bid as $bid)
                        <article>
                            <div class="panel-body">
                                {{ $bid->body }}
                            </div>
                        </article>
                        <hr>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection