<?php namespace az\Http\Controllers;

use az\AZSubject;
use az\AZArea;
use az\Http\Requests;
use az\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AZSubjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$AZSubject =  AZSubject::orderBy('name', 'ASC')->get();
		
		return response()->json($AZSubject->toArray());
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
	public function byArea($id)
	{
		//
		if(is_numeric($id)){
			$model = AZSubject::where('area_id', '=', $id)->orderBy('name','ASC')->get();
		} else {
			$id = str_replace("-", " ", $id);
			$model = AZArea::whereRaw('LOWER(name) = ?', [$id])->orderBy('name','ASC')->first();
			$model = AZSubject::where('area_id', '=', $model->id)->orderBy('name','ASC')->get();
		}
		//$model =  AZSubject::all();
		return response()->json($model->toArray());
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
