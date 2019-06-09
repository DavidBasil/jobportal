@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">
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
					<h2>{{ $company->jobs }}</h2>
					{{-- <p>Slogan | Address | Phone | Website</p> --}}
				</div>
			</div>	
	</div>
</div>
@endsection
