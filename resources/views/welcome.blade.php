@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
			<h2>Recent Jobs</h2>
			{{-- table of jobs --}}
			<table class="table">
				<thead>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</thead>	
				<tbody>
					{{-- jobs loop --}}
					@foreach($jobs as $job)
					<tr>
						<td><img src="{{ asset('avatar/logo.jpeg') }}" width="80"></td>
						<td>Position: {{ $job->position }}
							<br>
							<i class="fa fa-clock"></i> {{ $job->type }}
						</td>
						<td><i class="fa fa-map-marker"></i> Address: {{ $job->address }}</td>
						<td><i class="fa fa-globe"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
						<td>
							{{-- link to each individual job --}}
							<a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
								<button class="btn btn-success btn-sm">Apply</button></td>
							</a>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
</div>
@endsection
