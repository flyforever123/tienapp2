<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;

use App\Category;

use App\Bid;

class JobController extends Controller
{
	public function __construct()
	{

	}
    public function index()
    {
    	$jobs = Job::latest();

    	if($cat_id = request('cat_id')) {
    		$jobs->where('cat_id', $cat_id);
    	}

    	$jobs = $jobs->get();
    	return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	$job = new Job([
    		'title' => request('title'),
    		'body'  => request('body'),
    		'user_id' => auth()->id(),
    		'cat_id'  => request('category'),
    		'budget'  => request('budget')
    	]);

    	$job->save();

    	return redirect()->route('jobs.show', $job);
    }
}
