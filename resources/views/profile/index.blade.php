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
				<div class="card-body">

					{{-- form --}}
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" class="form-control">
					</div>
					<div class="form-group">
						<label for="experience">Experience</label>
						<textarea name="experience" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="bio">Bio</label>
						<textarea name="bio" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-success w-100" type="submit">Update</button>
					</div>

				</div>
			</div>
		</div>

		{{-- right column --}}
		<div class="col-md-4">

			<div class="card">
				<div class="card-header">Your Information</div>
				<div class="card-body">User Details</div>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Coverletter</div>
				<div class="card-body">
					<input type="file" name="cover_letter" class="form-control">
					<button class="btn btn-success" type="submit">Update</button>
				</div>
			</div>

			<div class="card mt-2">
				<div class="card-header">Update Resume</div>
				<div class="card-body">
					<input type="file" name="resume" class="form-control">
					<button class="btn btn-success" type="submit">Update</button>
				</div>
			</div>

		</div>

	</div>
</div>
@endsection
