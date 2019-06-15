<?php

namespace CMS;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable = [
    	'blog_name', 'phone_num', 'blog_email', 'address'];
}
