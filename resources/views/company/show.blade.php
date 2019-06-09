@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">

		{{-- company profile --}}
		<div class="company-profile">
			<img src="{{ asset('cover/cover.jpg') }}" alt="" class="w-100">
			<div class="company-desc mt-4">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('avatar/logo.jpeg') }}" alt="" class="w-100">
					</div>
					<div class="col-md-8">
						<h3>{{ $company->cname }}</h3>
						<p><em>{{ $company->slogan }}</em></p>
					</div>
				</div>
				<p class="my-4">{{ $company->description }}</p>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><i class="fa fa-globe"></i> {{ $company->address }}</li>
					<li class="list-group-item"><i class="fa fa-phone"></i> {{ $company->phone }}</li>
					<li class="list-group-item"><i class="fa fa-link"></i> {{ $company->website }}</li>
				</ul>
			</div>
		</div>	

		{{-- jobs posted by a company --}}
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
				@foreach($company->jobs as $job)
					<tr>
						<td><img src="{{ asset('avatar/logo.jpeg') }}" width="80"></td>
						<td><span class="text-primary">Position:</span> {{ $job->position }}
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
