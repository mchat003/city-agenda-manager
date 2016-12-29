<?php

use Illuminate\Http\Response;

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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('config', function () {
    return response()->json([
    	'itemUnderDiscussionFilePath' => env('ITEM_UNDER_DISCUSSION_FILE_PATH'),
    	'meetingAgendaFilePath' => env('MEETING_AGENDA_FILE_PATH')
	]);
});