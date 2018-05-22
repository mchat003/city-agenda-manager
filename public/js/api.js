var api = {
	HOST: '/api'
}

api.endpointConfig = api.HOST + '/config'
api.endpointMeetings = api.HOST + '/meetings'
api.endpointMeetingsCurrent = api.HOST + '/meetings/current'

api.getConfig = function(){
	return $.ajax({
	    type: 'GET',
	    url: api.endpointConfig,
	});
};

api.getMeetings = function(){
	return $.ajax({
	    type: 'GET',
	    url: api.endpointMeetings,
	});
};

api.updateMeetings = function(meetingObjs){
	meetingObjs = typeof meetingObjs !== 'string' ? JSON.stringify(meetingObjs) : meetingObjs;

	return $.ajax({
	    type: 'PUT',
	    dataType: 'json',
	    url: api.endpointMeetings,
	    //headers: {"X-HTTP-Method-Override": "PUT"},
	    data: meetingObjs
	});
};

api.getCurrentMeeting = function(){
	return $.ajax({
	    type: 'GET',
	    url: api.endpointMeetingsCurrent
	});
};

api.updateCurrentMeeting = function(meetingObj){
	meetingObj = typeof meetingObj !== 'string' ? JSON.stringify(meetingObj) : meetingObj;

	return $.ajax({
	    type: 'PUT',
	    dataType: 'json',
	    url: api.endpointMeetingsCurrent,
	    //headers: {"X-HTTP-Method-Override": "PUT"},
	    data: meetingObj
	});
};
