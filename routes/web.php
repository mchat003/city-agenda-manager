<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$currentItemPath = env('ITEM_UNDER_DISCUSSION_FILE_PATH');
//$meetingsPath = env('MEETING_AGENDA_FILE_PATH');


function updateMeetingStatus($id, $status){
	$meetingsPath = '../' . env('MEETING_AGENDA_FILE_PATH');;
	$reading = fopen($meetingsPath, 'r');
	$writing = fopen($meetingsPath . '.tmp', 'w');

	$replaced = false;
	$index = 0;

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if ($index == $id) {

	  	$statusPos = getStatusPos($line);

		if($statusPos !== false){
			$line = trim(substr($line, 0, $statusPos)) . ' ' . substr($line, $statusPos);
		} else {
			$line = $line . ' ' . substr($line, $statusPos);
		}

	    $replaced = true;
	  }
	  
	  fputs($writing, $line);
	  $index++;
	}
	fclose($reading); fclose($writing);
	// might as well not overwrite the file if we didn't replace anything
	if ($replaced) 
	{
	  rename($meetingsPath . '.tmp', $meetingsPath);
	} else {
	  unlink($meetingsPath . '.tmp');
	}
}

function getStatusPos($text){
	$statuses = array(
		'DISCUSSED'
	);


	foreach($statuses as $status){
		
		$statusPos = strpos($text, $status);

		if($statusPos !== false){
			return $statusPos;
		}
	}

	return false;
}

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('api/config', function () {
    return response()->json([
    	'itemUnderDiscussionFilePath' => $currentItemPath,
    	'meetingAgendaFilePath' => $meetingsPath
	]);
});



$app->get('api/meetings', function () {
	$meetingsPath = env('MEETING_AGENDA_FILE_PATH');
	$meetingsFileContents = file_get_contents('../' . $meetingsPath, FILE_USE_INCLUDE_PATH);
	$meetingList = explode(PHP_EOL, $meetingsFileContents);
	$body = array();

	foreach($meetingList as $index => $line){
		if(!empty($line)){

			$statusPos = getStatusPos($line);

			if($statusPos !== false){
				$body[$index]['title'] = trim(substr($line, 0, $statusPos));
				$body[$index]['status'] = substr($line, $statusPos);
			} else {
				$body[$index]['title'] = $line;
				$body[$index]['status'] = '';
			}

			$body[$index]['id'] = $index;
			
		}
	}

    return response()->json($body);
});


$app->put('api/meetings/{index}', function () {
	//$meetingsPath = env('MEETING_AGENDA_FILE_PATH');
	//$newStatus = $request->json('status');

	//updateMeetingStatus($id, $newStatus);

    return response()->json([
    	'index' => '$index',
    	'status' => '$newStatus'
    ]);
});


$app->get('api/meetings/current', function () {
	$currentItemPath = env('ITEM_UNDER_DISCUSSION_FILE_PATH');
	$currentItemFileContents = file_get_contents('../' . $currentItemPath, FILE_USE_INCLUDE_PATH);

    return response()->json([
    	'title' => trim($currentItemFileContents)
    ]);
});

$app->put('api/meetings/current', function (Request $request) {
	$currentItemPath = env('ITEM_UNDER_DISCUSSION_FILE_PATH');
	$newTitle = $request->json('title');

	file_put_contents('../' . $currentItemPath, $newTitle);

    return response()->json([
    	'title' => $newTitle
    ]);
});