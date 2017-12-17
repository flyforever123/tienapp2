@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9">
            @if(auth()->check())
                <form method="POST" action="http://localhost/vlance/public/new_job">
                    {{ csrf_field() }}
                    <div class='form-group'>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Job title">
                    </div>
                    <div class="form-group">
                        <select id="category" type="category" class="form-control" name="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <textarea name='body' id='body' class='form-control' placeholder='Job Description' rows='5'></textarea>
                    </div>
                    <div class='form-group'>
                        <input type="number" name="budget" class="form-control" id="budget" placeholder="Job Budget">
                    </div>
                    <button type='submit' class='btn btn-default'>Post</button>
                </form>
            @else
                <p>Please <a href="{{ route("login") }}">sign in</a> to post a reply to this thread</p>
            @endif
        </div>
    </div>
</div>
@endsection