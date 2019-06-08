@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ $job->title }}</div>
					<div class="card-body">
						<p>
						<h3>Description</h3>
						{{ $job->description }}</p>
						<hr>
						<p>
						<h3>Duties</h3>
						{{ $job->roles }}</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Short Info</div>
					<div class="card-body">
						<p>Company:</p>
						<p>Address: {{ $job->address }}</p>
						<p>Employment Type: {{ $job->type }}</p>
						<p>Position: {{ $job->position }}</p>
						<p>Date: {{ $job->created_at->diffForHumans() }}</p>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
