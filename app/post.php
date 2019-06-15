<?php

namespace CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{

	use SoftDeletes;

	protected $fillable = [
        'title', 'content', 'category_id', 'file', 'slug'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'deleted_at', 'slug'
    ];

    public function getFileAttribute($file){
    	return asset($file);
    }

    public function category()
    {
    	return $this->belongsTo('CMS\category');
    }

    public function tags()
    {
        return $this->belongsToMany('CMS\tag')->withTimestamps();
    }
}
