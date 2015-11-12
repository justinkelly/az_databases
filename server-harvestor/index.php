<?php

require 'vendor/autoload.php';

//$client = new \Phpoaipmh\Client('http://some.service.com/oai');
$client = new \Phpoaipmh\Client("https://ap01-a.alma.exlibrisgroup.com/view/oai/61SUT_INST/request/oai");
$myEndpoint = new \Phpoaipmh\Endpoint($client);

//$recs = $myEndpoint->listRecords('marc21','','','LSS');
$recs = $myEndpoint->listRecords('marc21','','','LSS');

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


	if( $data->metadata->record->leader )
	{
	echo "<tr><td>";
/*
echo "<br />";
var_dump($data->metadata->record);
echo "<br />";
echo "<br />";
echo "<hr />";
*/
	//	echo "Leader:". $data->metadata->record->leader. "<br />";
		//echo "MMS ID: ". $data->metadata->record->controlfield[5]. "<br />";
		$title='';
		$alt_title='';
		$url='';
		$description='';
		$user='';
		$area='';
		$subject='';
		foreach ($data->metadata->record->datafield as $field)
		{
		    switch((string) $field['tag']) { // Get attributes as element indices
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
			echo $title."<br />";
			break;
		    case '246':
			//alt title
			var_dump($field);
			foreach($field->subfield as $sub)
			{
				    switch((string) $sub['code']) {
					case 'a':
						$alt_title = $sub;
						break;
					}

			}
			//echo '<i>Alt Title: </i>'. $alt_title."<br />";
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
			//echo '<i>URL: </i>'. $url ."</br >";
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
			//echo 'Description: </i>'. $description ."<br />";
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
			//	echo '<i>User: </i>'. $user ."<br />";
			}
			break;
		    case '960':
			$area='';
			$subject='';
			foreach($field->subfield as $sub)
			{
				    switch((string) $sub['code']) {
					case 'a':
						$area = $sub;
						break;
					case 'b':
						$subject =  $sub;
						break;
					}

			}
			//echo '<i>Area: </i>'. $area."<br />";
			//if($subject) echo '<i>-- Subject: </i>'. $subject."<br />";
			break;
		    }
			//get title

			//get url
			
			//get area

			//get subejct
	
		}

	echo "</td></tr>";	
	}
}
echo "</tbody></table>";
