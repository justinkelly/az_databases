<?php namespace az;

use Illuminate\Database\Eloquent\Model;

class AZSubject extends Model {

	//
	protected $table = 'az_subject';
	protected $fillable = array('area_id','name');
}
