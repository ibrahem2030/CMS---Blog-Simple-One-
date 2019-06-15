<?php

namespace CMS;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

	protected $fillable = [
        'avatar', 'user_id', 'facebook', 'twitter', 'github', 'avout'
    ];


    public function user(){
        return $this->belongsTo('CMS\User');
    }
}
