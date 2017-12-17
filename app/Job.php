<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Category;

use App\Bid;

class Job extends Model
{
	protected $fillable = ['title', 'body', 'user_id', 'cat_id', 'budget'];

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'cat_id');
    }

    public function bid()
    {
    	return $this->hasMany(Bid::class);
    }

    public function addBid($bid)
    {
    	$this->bid()->create($bid);
    }
}
