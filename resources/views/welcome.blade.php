@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
			<h2>Recent Jobs</h2>
			<table class="table">
				<thead>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</thead>	
				<tbody>
					@foreach($jobs as $job)
					<tr>
						<td><img src="{{ asset('avatar/logo.jpeg') }}" width="80"></td>
						<td>Position: {{ $job->position }}
							<br>
							<i class="fa fa-clock"></i> {{ $job->type }}
						</td>
						<td><i class="fa fa-map-marker"></i> Address: {{ $job->address }}</td>
						<td><i class="fa fa-globe"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
						<td><button class="btn btn-success btn-sm">Apply</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
</div>
@endsection
