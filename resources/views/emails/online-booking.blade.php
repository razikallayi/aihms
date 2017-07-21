<!DOCTYPE html>
<html>
<head></head>
<body style='background: white; color: #222'>
<table width='600px' border='0'>
		<thead>
		<tr><th colspan='2'><img style='height:50px;' src='{{url(config('whyte.project.logo'))}}'><h4>{{config('whyte.project.name')}} Online Booking</h4></th></tr>
		</thead>
		<tbody>
			<tr><td>Name</td><td>{{$request->name}}</td></tr>
			<tr><td>Place</td><td>{{$request->place}}</td></tr>
			<tr><td>Email</td><td>{{$request->email}}</td></tr>
			<tr><td>Phone</td><td>{{$request->phone}}</td></tr>
			<tr><td>Department</td><td>{{$request->department}}</td></tr>
			<tr><td>Doctor</td><td>{{$request->doctor}}</td></tr>
			<tr><td>Location</td><td>{{$request->location}}</td></tr>
			<tr><td>Prefered Time</td><td>{{$request->time}}</td></tr>
			<tr><td>Message</td><td>{{$request->message}}</td></tr>
		</tbody>
	</table>
</body>
</html>
