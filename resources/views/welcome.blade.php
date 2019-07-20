@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 w-100">
      <search-component></search-component>
    </div>
    <h2 class="mb-3 text-uppercase text-primary">Recent Jobs</h2>
    {{-- table of jobs --}}
    <table class="table table-bordered table-hover text-uppercase">
      <thead class="bg-dark text-white">
        <tr>
          <th></th>
          <th><i class="fa fa-user"></i> position</th>
          <th><i class="fa fa-clock-o"></i> hours</th>
          <th><i class="fa fa-globe"></i> address</th>
          <th><i class="fa fa-calendar"></i> date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        {{-- jobs loop --}}
        @foreach($jobs as $job)
          <tr>
            @if(!empty(Auth::user()->company->logo))
              <td><img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" class="w-50"></td>
            @else
              <td class="text-center"><img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-50"></td>
            @endif
            <td> {{ $job->position }}
            </td>
            <td>
              {{ $job->type }}
              
            </td>
            <td> 
              {{ $job->address }}</td>
            <td> 
             {{ $job->created_at->diffForHumans() }}</td>
            <td>
              {{-- link to each individual job --}}
              <a href="{{ route('job.show', [$job->id, $job->slug]) }}">
                <button class="btn btn-primary btn-round btn-lg">Apply</button></td>
              </a>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="text-center">
  <a href="{{ route('alljobs') }}" class="btn btn-primary w-50 text-uppercase"><h5 class="pt-2">Browse all jobs</h5></a>
  </div>
</div>

<hr>

  <div class="container-fluid">
  <h3 class="border-bottom border-warning w-25 pr-2">Featured Companies</h3>
    <div class="row row-eq-height">
      @foreach($companies as $company)
        <div class="col-md-3 mt-2">

          <div class="card h-100 rounded rounded-lg">
            <img src="{{ asset('uploads/coverphoto') }}/{{$company->cover_photo}}" alt="" class="w-100">
            <div class="card-body">
              <h5 class="card-title">{{ str_limit($company->cname, 10) }}</h5>
              <p class="card-text">{{ str_limit($company->description, 28) }}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="btn btn-warning mb-0 text-dark font-weight-bold">Visit Company</a>
            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>
  </div>

@endsection
