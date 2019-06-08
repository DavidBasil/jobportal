@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
			<h2>Recent Jobs</h2>
			<table class="table">
				<thead>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</thead>	
				<tbody>
					@for($i=0; $i<10; $i++)
					<tr>
						<td><img src="{{ asset('avatar/logo.jpeg') }}" width="80"></td>
						<td>Position: Web Developer</td>
						<td>Address: Melbourne</td>
						<td>Date: 2019-06-06</td>
						<td><button class="btn btn-success btn-sm">Apply</button></td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
</div>
@endsection
