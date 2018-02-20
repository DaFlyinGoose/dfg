<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = 'groups';
	
	public function articles()
    {
        return $this->hasMany('\Models\Article');
    }
}