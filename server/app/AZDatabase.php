<?php namespace az;

use Illuminate\Database\Eloquent\Model;

class AZDatabase extends Model {

	//
	protected $table = 'az_database';

public function scopeNameAscending($query)
{
        return $query->orderBy('name','ASC');
}   
}
