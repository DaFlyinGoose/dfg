<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $table = 'emails';
	
	protected $fillable = array('email', 'name', 'group_id');
	
	public function group() 
	{
		return $this->belongsTo('\Models\EmailGroups');
	}
}