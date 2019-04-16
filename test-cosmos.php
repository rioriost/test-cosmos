#!/usr/local/bin/php -q
<?php
ob_start();
require_once 'AzureDocumentDB-PHP/phpdocumentdb.php';

function usage($message){
	echo($message . "\n\n");
	echo <<< EOL
docker run -i -t rioriost/test-cosmos --env COSMOS_URI=https://REPLACEHERE.documents.azure.com:443 --env COSMOS_KEY="PrimaryOrSecondaryKey==" --env DB_ID="test_db" --env COL_ID="test_collection"
You can find URI, PRIMARY KEY or SECONDARY KEY on [Keys] pane of Cosmos DB [Menu] on Azure Portal.
EOL;
	exit();
}

foreach($argv as $arg){
	list($k, $v) = explode("=", $arg);
	$opts[$k] = $v;
}

$uri = $opts["COSMOS_URI"];
if($uri === ""){
	usage("CosmosDB URI is needed.");
}

$uri_parts = parse_url($uri);
if($uri_parts['scheme'] != "https"){
	usage("CosmosDB URI must be started with 'https' scheme.");
}

$master_key = $opts["COSMOS_KEY"];
if($master_key === ""){
        usage("CosmosDB PRIMARY or SECONDARY KEY is needed.");
}

$db_id = $opts["DB_ID"];
if($db_id === ""){
        usage("DB ID you want to connect is needed.");
}

$col_id = $opts["COL_ID"];
if($col_id === ""){
        usage("Collection ID you want to connect is needed.");
}

// connect DocumentDB
try {
	$documentdb = new DocumentDB($uri, $master_key);
} catch (Exception $e) {
	echo $e->getMassage(), "\n";
}

// select Database or create
try {
	$db = $documentdb->selectDB($db_id);
} catch (Exception $e) {
	echo $e->getMassage(), "\n";
}

// select Collection or create
try {
	$col = $db->selectCollection($col_id);
} catch (Exception $e) {
	echo $e->getMassage(), "\n";
}

// store JSON document ("id" needed)
//$data = '{"id":"1234567890", "FirstName": "Paul","LastName": "Smith"}';
//$result = $col->createDocument($data);

// run query
$json = $col->query("SELECT * FROM " . $col_id);

$contents = json_decode($json);

var_dump($contents);

ob_end_flush();
?>
