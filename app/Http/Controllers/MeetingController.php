<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
  
  
class MeetingController extends Controller{

    public function testGet($id){
        return response()->json([
            'id' => $id,
            //'body' => $request->all()
        ]);
    }
    
    public function updateMeeting(Request $request,$id){
        //$meetingsPath = env('MEETING_AGENDA_FILE_PATH');
        //$newStatus = $request->json('status');

        //updateMeetingStatus($id, $newStatus);

        return response()->json([
            //'index' => $index//,
            //'body' => $request->all()
        ]);
    }
  
}