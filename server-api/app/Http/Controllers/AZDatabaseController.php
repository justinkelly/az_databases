<?php namespace az\Http\Controllers;

use az\AZDatabase;
use az\AZArea;
use az\AZSubject;
use az\Http\Requests;
use az\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AZDatabaseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$AZArea =  AZDatabase::nameAscending()->get();

		return response()->json($AZArea);
	}
	public function search($term)
	{
		//a
		$AZSearch= DB::table('az_database')
			->where('name', 'LIKE', "%$term%")
			->orWhere('description', 'LIKE', "%$term%")
			->orWhere('metadata', 'LIKE', "%$term%")
			->orWhere('url', 'LIKE', "%$term%")
			->orderBy('name','ASC')
			->get();

		return response()->json($AZSearch);
	}
	public function byLetter($letter)
	{
		//
		$AZArea =  AZDatabase::where('name', 'LIKE', "$letter%")->get();

		return response()->json($AZArea->toArray());
	}
	public function byArea($area_id)
	{
		//
		if(is_numeric($area_id))
		{
			$model = DB::table('az_database')
				->join('az_database_area', 'az_database_area.database_id', '=', 'az_database.id')
				->join('az_area', 'az_area.id', '=', 'az_database_area.area_id')
				->where('az_area.id','=',$area_id)
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user','az_area.name as area_name', 'az_database.description as description')
				->get();
		} else {
			$area_id = str_replace("-", " ", $area_id);
			$model = DB::table('az_database')
				->join('az_database_area', 'az_database_area.database_id', '=', 'az_database.id')
				->join('az_area', 'az_area.id', '=', 'az_database_area.area_id')
				->whereRaw('LOWER(az_area.name) = ?',[$area_id])
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user','az_area.name as area_name', 'az_database.description as description')
				->get();
		}
		//$model = AZSubject::where('area_id', '=', $id)->get();
		//$model =  AZSubject::all();
		return response()->json($model);
	}
	public function byAreaSubject($area_id,$subject_id)
	{

		//
		if(is_numeric($subject_id))
		{
			$model = DB::table('az_database')
				->join('az_database_subject', 'az_database_subject.database_id', '=', 'az_database.id')
				->join('az_subject', 'az_subject.id', '=', 'az_database_subject.subject_id')
				->where('az_subject.id','=',$subject_id)
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user', 'az_subject.name as subject', 'az_database.description as description')
				->get();
		} else {
			$area_id = str_replace("-", " ", $area_id);
			$subject_id = str_replace("-", " ", $subject_id);
			$a_model = AZArea::whereRaw('LOWER(name) = ?', [$area_id])->first();
			$s_model = AZSubject::where('area_id','=',$a_model->id)->whereRaw('LOWER(name) = ?', [$subject_id])->first();

			$model = DB::table('az_database')
				->join('az_database_subject', 'az_database_subject.database_id', '=', 'az_database.id')
				->join('az_subject', 'az_subject.id', '=', 'az_database_subject.subject_id')
				->where('az_subject.id','=',$s_model->id)
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user', 'az_subject.name as subject', 'az_database.description as description')
				->get();

		}

		//$model = AZSubject::where('area_id', '=', $id)->get();
		//$model =  AZSubject::all();
		return response()->json($model);
	}


	public function bySubject($subject_id)
	{

		//
		if(is_numeric($subject_id))
		{
			$model = DB::table('az_database')
				->join('az_database_subject', 'az_database_subject.database_id', '=', 'az_database.id')
				->join('az_subject', 'az_subject.id', '=', 'az_database_subject.subject_id')
				->where('az_subject.id','=',$subject_id)
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user', 'az_subject.name as subject', 'az_database.description as description')
				->get();
		} else {

			$subject_id = str_replace("-", " ", $subject_id);
			$model = AZSubjact::whereRaw('LOWER(name) = ?', [$subject_id])->orderBy('name','ASC')->first();
			$model = DB::table('az_database')
				->join('az_database_subject', 'az_database_subject.database_id', '=', 'az_database.id')
				->join('az_subject', 'az_subject.id', '=', 'az_database_subject.subject_id')
				->where('az_subject.id','=',$model->_id)
				->orderBy('az_database.name','ASC')
				->select('az_database.name as name', 'az_database.url as url','az_database.user as user', 'az_subject.name as subject', 'az_database.description as description')
				->get();

		}

		//$model = AZSubject::where('area_id', '=', $id)->get();
		//$model =  AZSubject::all();
		return response()->json($model);
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
