<?php

require 'vendor/autoload.php';

//$client = new \Phpoaipmh\Client('http://some.service.com/oai');
$client = new \Phpoaipmh\Client("https://ap01-a.alma.exlibrisgroup.com/view/oai/61SUT_INST/request/oai");
$myEndpoint = new \Phpoaipmh\Endpoint($client);

$recs = $myEndpoint->listRecords('marc21','','','LSS');
foreach($recs as $item) {
$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($item->asXML());
echo "<pre>".htmlentities($dom->saveXML())."</pre>";
}


