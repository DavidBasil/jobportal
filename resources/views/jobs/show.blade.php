@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			{{-- job description and duties --}}
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
			{{-- job info details --}}
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Short Info</div>
					<div class="card-body">
						<p>Company: <a href="{{ route('company.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }}</a>
						</p>
						<p>Address: {{ $job->address }}</p>
						<p>Employment Type: {{ $job->type }}</p>
						<p>Position: {{ $job->position }}</p>
						<p>Date: {{ $job->created_at->diffForHumans() }}</p>
					</div>
				</div>
				@if(Auth::check() && Auth::user()->user_type='seeker')
				{{-- job apply button --}}
				<button class="btn btn-success btn-block mt-1">Apply</button>
				@endif
			</div>

		</div>
	</div>
@endsection
