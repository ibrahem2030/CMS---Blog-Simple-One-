<?php

namespace CMS;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts()
    {
    	return $this->hasMany('CMS\post');
    }
    
}
