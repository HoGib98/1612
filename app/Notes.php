<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
	protected $fillable = ['address', 'age', 'leve', 'user_id'];

	//thuoc ve onetomany
	public function user()
    {
    	 return $this->belongsTo('App\User', 'user_id');
    }
}