@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h2 class="mb-3">Recent Jobs</h2>
    {{-- table of jobs --}}
    <table class="table">
      <tbody>
        {{-- jobs loop --}}
        @foreach($jobs as $job)
          <tr>
            @if(!empty(Auth::user()->company->logo))
              <td><img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" class="w-75"></td>
            @else
              <td><img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-75"></td>
            @endif
            <td><span class="text-primary">Position:</span> {{ $job->position }}
              <br>
              <i class="fa fa-clock"></i> {{ $job->type }}
            </td>
            <td><i class="fa fa-map-marker"></i> 
              Address: {{ $job->address }}</td>
            <td><i class="fa fa-globe"></i> 
              Date: {{ $job->created_at->diffForHumans() }}</td>
            <td>
              {{-- link to each individual job --}}
              <a href="{{ route('job.show', [$job->id, $job->slug]) }}">
                <button class="btn btn-success btn-sm">Apply</button></td>
              </a>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <button class="btn btn-success btn-lg w-100">Browse all jobs</button>
  <br><br>
  <h2>Featured Companies</h2>
</div>

<div class="container-fluid">
  <div class="row row-eq-height">
    @foreach($companies as $company)
    <div class="col-md-3 mt-2">
      <div class="card h-100">
        <img src="{{ asset('uploads/coverphoto') }}/{{$company->cover_photo}}" alt="" class="w-100">
        <div class="card-body">
          <h5 class="card-title">{{ $company->cname }}</h5>
          <p class="card-text">{{ str_limit($company->description, 30) }}</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="btn btn-primary">Visit Company</a>
        </div>
      </div>
    </div>
  @endforeach
    </div>
  </div>
</div>
@endsection
