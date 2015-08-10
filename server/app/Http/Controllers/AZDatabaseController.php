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
		//echo $term;
			//handle searchs for titles

		if(substr( $term, 0, 6 ) === "title:"){

				//remove the title: from the start and trim the term
				$term = explode('title:',$term);
				$term = trim($term[1]);

				$re = "/^\"/";

				//handle quoted/exact title search
					if(preg_match($re,$term)){

							//remove the leadign and trailing "
							$term = trim($term,'"');

						//	echo 'Exact';
						//		echo $term;
						$AZSearch= DB::table('az_database')
						->where('name', '=', "$term")
						->orderBy('name','ASC')
						->get();
					} else {
					//	echo 'NonExact';
					//	  echo $term;
						//non esact title search
						$AZSearch= DB::table('az_database')
						->where('name', 'LIKE', "%$term%")
						->orderBy('name','ASC')
						->get();
			 		}
		} else {
		//normal search
		$AZSearch= DB::table('az_database')
			->where('name', 'LIKE', "%$term%")
			->orWhere('description', 'LIKE', "%$term%")
			->orWhere('metadata', 'LIKE', "%$term%")
			->orWhere('url', 'LIKE', "%$term%")
			->orderBy('name','ASC')
			->get();
		}

		return response()->json($AZSearch);
	}
	public function byLetter($letter)
	{

		$AZArea =  AZDatabase::where('name', 'LIKE', "$letter%")
							->orWhere('name', 'LIKE', "The $letter%")
							->orderBy('name','ASC')->get();

    $AZLetter = $AZArea->toArray();

   //LOOP ALLA -	IF TERM NOT T then remove leading The
  if(!stristr('t',$letter))
	{
		foreach($AZLetter as $key=>$val)
		{
			if(substr( $val['name'], 0, 4 ) === "The ")
			{
				$AZLetter[$key]['name'] = ucfirst(substr( $val['name'], 4 ));
			}
		}

		$tmp = Array();
		foreach($AZLetter as &$ma) $tmp[] = &$ma["name"];

		array_multisort($tmp,SORT_NATURAL | SORT_FLAG_CASE, $AZLetter);

	}
			 //sort arrat
		return response()->json($AZLetter);
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
