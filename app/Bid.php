<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Job;

class Bid extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'cost', 'time'];

    public function ofJob()
    {
    	return $this->belongsTo(Job::class, 'job_id');
    }
}
