<?php

namespace CMS;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
	protected $fillable = [
        'tag'
    ];

    public function posts()
    {
    	return $this->belongsToMany('CMS\post');
    }
}
