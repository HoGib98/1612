<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uinfo extends Model
{
    protected $table = 'userinfo';
	protected $fillable = ['content', 'user_id'];

	//thuoc ve onetomany
	public function user()
    {
    	 return $this->belongsTo('App\User', 'user_id');
    }
}
