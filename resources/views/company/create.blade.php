@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		{{-- left column --}}	
		<div class="col-md-3">
			@if(empty(Auth::user()->profile->avatar))
				<img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-100">
			@else
				<img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="" class="w-100">
			@endif
			{{-- avatar form --}}
			<form action="{{ route('avatar') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-body">
						<input type="file" name="avatar" class="form-control">
						<button class="btn btn-success mt-2 w-100" type="submit">Update</button>
					</div>
				</div>
			</form>
		</div>

		{{-- center column --}}	
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">Update Your Company</div>

				{{-- form --}}
				<form action="{{ route('company.store') }}" method="post">@csrf
					<div class="card-body">
						{{-- address input --}}
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control"
								value="{{ Auth::user()->company->address }}">
						</div>
						{{-- phone --}}
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" name="phone" class="form-control"
								value="{{ Auth::user()->company->phone }}">
						</div>
						{{-- website --}}
						<div class="form-group">
							<label for="website">Website</label>
							<input type="text" name="website" class="form-control"
								value="{{ Auth::user()->company->website }}">
						</div>
						{{-- slogan --}}
						<div class="form-group">
							<label for="slogan">Slogan</label>
							<input type="text" name="slogan" class="form-control"
								value="{{ Auth::user()->company->slogan }}">
						</div>
						{{-- description --}}
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" rows="8" cols="40" class="form-control">
								{{ Auth::user()->company->description }}
							</textarea>
						</div>

						{{-- submit --}}	
						<div class="form-group">
							<button class="btn btn-success w-100" type="submit">Update</button>
						</div>

						{{-- session message --}}
						@if(Session::has('message'))
							<div class="alert alert-success w-100 text-center">
								{{ Session::get('message') }}
							</div>
						@endif

					</div>
				</form>

			</div>
		</div>

		{{-- right column --}}
		<div class="col-md-4">

			<div class="card">
				<div class="card-header">About the company</div>
				<div class="card-body">
					<p>Name: <strong>{{ Auth::user()->company->cname }}</strong></p>
					<p>Address: <strong>{{ Auth::user()->company->address }}</strong></p>
					<p>Phone: <strong>{{ Auth::user()->company->phone }}</strong></p>
					<p>Website: <strong>{{ Auth::user()->company->website }}</strong></p>
					<p>Slogan: <strong>{{ Auth::user()->company->slogan }}</strong></p>
					<p>
					<a href="company/{{Auth::user()->company->slug}}">view</a>
					</p>
				</div>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Cover Photo</div>
				<form action="{{ route('cover.photo') }}" 
					method="post" 
					enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<input type="file" name="cover_photo" class="form-control">
						<button class="btn btn-success w-100 mt-2" type="submit">Update</button>
					</div>
				</form>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Resume</div>

			</div>

		</div>

	</div>
</div>
@endsection
