<?php namespace az\Http\Controllers;

use az\Http\Requests;
use az\AZArea;
use az\AZSubject;
use az\AZDatabase;
use az\AZDatabaseArea;
use az\AZDatabaseSubject;
use az\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		define('STDIN',fopen("php://stdin","r"));

		function ArtMigr(){
			try {
				\Artisan::call('migrate:refresh');
				#\Artisan::call('migrate', ['--quiet' => true, '--force' => true]);
			} catch (Exception $e) {
				echo $e;
			}

		}
		ArtMigr();

		$client = new \Phpoaipmh\Client("https://ap01-a.alma.exlibrisgroup.com/view/oai/61SUT_INST/request/oai");
		$myEndpoint = new \Phpoaipmh\Endpoint($client);

		$recs = $myEndpoint->listRecords('marc21',null,null,'LSS');

		$area_subject_map=array();

		echo "
		<head><title>Swinburne AZ Database list</title>
				<link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css' rel='stylesheet'>
			</head>
		<body>
		<div class='container'>
		<h3>Swinburne: A-Z Database list</h3>
		<table class='table table-striped'>
		<tbody>
		";

		foreach($recs as $item) {

			$data =simplexml_load_string($item->asXML());

			if( isset($data->metadata->record->leader) )
			{
					echo "<br />";
					echo "<br />";
				$titles = array();
		
				echo "<tr><td>";
				$title='';
				$alt_title='';
				$alt_title_type='';
				$url='';
				$description='';
				$user='';
				$metadata ='';
				$area='';
				$area_map=array();
				$subject='';
				$mmsID='';
				$subject_map=array();
				foreach ($data->metadata->record->controlfield as $mm)
				{
					if (substr($mm,0,2) =='99')
					{
						$mmsID = $mm;
						break;
					}
				
				}
				
				//$mmsID = $data->metadata->record->controlfield[2][0];

				$database_area_subject_map=array();
				foreach ($data->metadata->record->datafield as $field)
				{	
					$alt_title_type='';
					switch((string) $field['tag']) 
					{
						case '245':
							foreach($field->subfield as $sub)
							{
								switch((string) $sub['code']) {
									case 'a':
										$title = $sub;
										break;
									case 'b':
										$title = $title .' : '. $sub;
										break;
								}

							}
							array_push($titles,(string)$title);
							echo '<i>Title: </i><b>'. $title."</b><br />";
							echo 'MMS ID: '. $mmsID."<br />";
							break;
						case '246':
							//alt title
							foreach($field->subfield as $sub)
							{
								switch((string) $sub['code']) {
									case 'a':
										$alt_title = $sub;
										break;
								}

							}
							switch ((string) $field['ind1']):
								case '1':
									//real alt title
									array_push($titles,(string)$alt_title);
									$alt_title_type='Additional record';
									$metadata .= $alt_title ." : ";
									break;	
								case '3':
									//searchable -= add to metatdata
									$alt_title_type='searchable';
									$metadata .= $alt_title ." : ";
									break;	
								case ' ':
									//mistake - add to metadata
									$alt_title_type='ERROR';
									$metadata .= $alt_title ." : ";
									break;	
								default:
									$alt_title_type='NO DATA:'. $field['ind1'] ;
									$metadata .= $alt_title ." : ";
									break;	
							endswitch;

							echo '<i>Alt Title ('.$alt_title_type.'): </i>'. $alt_title."<br />";
							break;
						case '917':
							//url
							foreach($field->subfield as $sub)
							{
								switch((string) $sub['code']) {
									case 'u':
										$url = $sub;
										break;
								}

							}
							echo '<i>URL: </i>'. $url ."</br >";
							break;
						case '520':
							//descriptionitle
							foreach($field->subfield as $sub)
							{
								switch((string) $sub['code']) {
									case 'a':
										$description = $sub;
										break;
								}

							}
							echo 'Description: </i>'. $description ."<br />";
							break;
						case '500':
							//uer limit
							$user='';
							foreach($field->subfield as $sub)
							{

								switch((string) $sub['code']) {
									case 'a':
										if(stristr($sub,'Concurrent'))
										{
											$user = $sub;
										}
										break;
								}

							}
							if($user){
								echo '<i>User: </i>'. $user ."<br />";
							}
							break;
						case '960':
							$area='';
							$subject='';
							foreach($field->subfield as $sub)
							{
								switch((string) $sub['code']) {
									case 'a':
										$area = trim($sub);
										//array_push($area_map,$area);
										$area_map[$area][]='';
										//if code !in aera array add it
										break;
									case 'b':
										$subject =  trim($sub);
										echo 'Area:'.$area;
										echo 'Subject:'.$subject;
										$area_map[$area][] = $subject;
										//if subejct !in subejctaera array add it
										break;
								}

							}


							//add subject to database-area mape
							echo '<i>Area: </i>'. $area."<br />";
							if($subject) echo '<i>-- Subject: </i>'. $subject."<br />";
							break;
					}
					echo "</td></tr>";
				}
				echo "</tbody></table>";

				//do the import stuff
				//Area
				//$flight =AZArea::firstOrCreate(['name' => $area]);
				foreach($titles as $az_database_title)
				{
					$db_new = new AZDatabase;
					$db_new->name = $az_database_title;
					$db_new->description = $description;
					$db_new->user = $user;
					$db_new->url = $url;
					$db_new->metadata = $metadata;
					$db_new->save();

					if($area_map){
						foreach($area_map as $area_key=>$area_value)
						{
							if(is_string($area_key) and $area_key!=='')
							{
								$area_db =AZArea::firstOrCreate(array('name' => $area_key));

								//insert =db into db area map
								$db_area_new = new AZDatabaseArea;
								$db_area_new->database_id = $db_new->id;
								$db_area_new->area_id = $area_db->id;
								$db_area_new->save();

								foreach($area_map[$area_key] as $subject_key=>$subject_value){
									if(is_string($subject_value) and $subject_value!=='')
									{
										$subject_db = AZSubject::where('name', '=', $subject_value)->where('area_id', '=', $area_db->id)->first();
										if(!$subject_db){
											$subject_db =AZSubject::create(array('area_id' => $area_db->id ,'name' => $subject_value));
										}
										//insert db into db area map
										$db_area_new = new AZDatabaseSubject;
										$db_area_new->database_id = $db_new->id;
										$db_area_new->subject_id = $subject_db->id;
										$db_area_new->save();
									}
								}
							}


						}
					}
				}
				//	print_r($area_map);

			}

		}
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
