@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center bg-primary text-white text-uppercase">
					Create a new Job
				</div>
				<div class="card-body">

					<form action="{{ route('job.create') }}" method="post">
					@csrf
					{{-- title --}}
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>

					{{-- description --}}	
					<div class="form-group">
						<label for="title">Description</label>
						<textarea name="description" rows="6" cols="40" class="form-control"></textarea>
					</div>

					{{-- roles --}}
					<div class="form-group">
						<label for="roles">Roles</label>
						<textarea name="roles" rows="6" cols="40" class="form-control"></textarea>
					</div>

					{{-- category --}}
					<div class="form-group">
						<label for="category">Category</label>
						<select name="category" id="category" class="form-control">
							@foreach(App\Category::all() as $cat)
								<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>

					{{-- position --}}
					<div class="form-group">
						<label for="position">Position</label>
						<input type="text" name="position" class="form-control">
					</div>

					{{-- address --}}
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" class="form-control">
					</div>

					{{-- type --}}
					<div class="form-group">
						<label for="type">Type</label>
						<select name="type" class="form-control">
							<option value="fulltime">Full Time</option>	
							<option value="partime">Part Time</option>	
							<option value="casual">Casual</option>	
						</select>
					</div>

					{{-- status --}}
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" class="form-control">
							<option value="1">Live</option>	
							<option value="0">Draft</option>	
						</select>
					</div>

					{{-- last date --}}
					<div class="form-group">
						<label for="last_date">Last date</label>
						<input type="date" name="last_date" class="form-control">
					</div>

					{{-- submit --}}
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
					</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
