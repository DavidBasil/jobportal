@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		{{-- left column --}}	
		<div class="col-md-2">
			<img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-100">
		</div>

		{{-- center column --}}	
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Update You Profile</div>

				{{-- form --}}
				<form action="{{ route('profile.create') }}" method="post">@csrf
					<div class="card-body">
	
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control" value="{{ Auth::user()->profile->address }}">
						</div>
						<div class="form-group">
							<label for="experience">Experience</label>
							<textarea name="experience" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
						</div>
						<div class="form-group">
							<label for="bio">Bio</label>
							<textarea name="bio" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success w-100" type="submit">Update</button>
						</div>

					{{-- session message --}}
					@if(Session::has('profile_message'))
						<div class="alert alert-success w-100 text-center">
							{{ Session::get('profile_message') }}
						</div>
					@endif

					</div>
				</form>

			</div>
		</div>

		{{-- right column --}}
		<div class="col-md-4">

			<div class="card">
				<div class="card-header">Your Information</div>
					<div class="card-body">
						<p>Name: {{ Auth::user()->name }}</p>
						<p>Email: {{ Auth::user()->email }}</p>
						<p>Address: {{ Auth::user()->profile->address }}</p>
						<p>Gender: {{ Auth::user()->profile->gender }}</p>
						<p>Member since: {{ Auth::user()->created_at->format('d-m-Y') }}</p>
						{{-- cover letter link --}}
						@if(!empty(Auth::user()->profile->cover_letter))
							<p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover letter</a></p>
						@else 
							<p>Please upload cover letter</p>
						@endif
						{{-- resume link --}}
						@if(!empty(Auth::user()->profile->resume))
							<p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Cover letter</a></p>
						@else 
							<p>Please upload resume</p>
						@endif
					</div>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Coverletter</div>
				<form action="{{ route('cover.letter') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<input type="file" name="cover_letter" class="form-control">
						<button class="btn btn-success w-100 mt-2" type="submit">Update</button>
						{{-- message --}}
						@if(Session::has('cover_letter_message'))
							<div class="{{ Session::get('class') }} mt-2">
								{{ Session::get('cover_letter_message') }}
							</div>
						@endif
					</div>
				</form>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Resume</div>
				<form action="{{ route('resume') }}" method="post" enctype="multipart/form-data">@csrf
					<div class="card-body">
						<input type="file" name="resume" class="form-control">
						<button class="btn btn-success w-100 mt-2" type="submit">Update</button>
						{{-- message --}}
						@if(Session::has('resume_message'))
							<div class="{{ Session::get('class') }} mt-2">
								{{ Session::get('resume_message') }}
							</div>
						@endif
					</div>
				</form>
			</div>

		</div>

	</div>
</div>
@endsection
