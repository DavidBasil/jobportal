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
					<div class="card-header">
						<div class="card-body">
							<input type="file" name="avatar" class="form-control">
							<button class="btn btn-success mt-2 w-100" type="submit">Update</button>
							@if(Session::has('avatar_message'))
								<div class="{{ Session::get('class') }}">
									{{ Session::get('avatar_message') }}
								</div>
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>

		{{-- center column --}}	
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">Update You Profile</div>

				{{-- form --}}
				<form action="{{ route('profile.create') }}" method="post">@csrf
					<div class="card-body">
						{{-- address input --}}
						<div class="form-group">
							@if($errors->has('address'))
								<p class="text-danger">{{ $errors->first('address') }}</p>
							@else
								<label for="address">Address</label>
							@endif
							<input type="text" name="address" class="form-control" value="{{ Auth::user()->profile->address }}">
						</div>
						{{-- phone number input --}}
						<div class="form-group">
							@if($errors->has('phone_number'))
							<p class="text-danger">{{ $errors->first('phone_number') }}</p>
							@else
							<label for="phone_number">Phone Number</label>
							@endif
							<input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->profile->phone_number }}">
						</div>
						{{-- experience input --}}
						<div class="form-group">
							@if($errors->has('experience'))
							<p class="text-danger">{{ $errors->first('experience') }}</p>
							@else
							<label for="experience">Experience</label>
							@endif
							<textarea name="experience" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
						</div>
						{{-- bio input --}}
						<div class="form-group">
							@if($errors->has('bio'))
							<p class="text-danger">{{ $errors->first('bio') }}</p>
							@else
							<label for="bio">Bio</label>
							@endif
							<textarea name="bio" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
						</div>
						{{-- submit --}}	
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
					<p>Phone: {{ Auth::user()->profile->phone_number }}</p>
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
