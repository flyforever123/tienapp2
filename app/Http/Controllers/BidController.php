<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;

class BidController extends Controller
{
    public function store(Job $job)
    {
    	$job->addBid([
    		'title'   => request('title'),
    		'body'    => request('body'),
    		'time'    => request('time'),
    		'cost'    => request('cost'),
    		'user_id' => auth()->id()
    	]);

    	return back();
    }
}
