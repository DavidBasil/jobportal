@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    {{-- job description and duties --}}
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="card-title"><h3>{{ $job->title }}</h3></div>
          <hr>
          <p>
            <h5>Description</h5>
            {{ $job->description }}</p>
            <hr>
          <p>
          <h5>Duties</h5>
          {{ $job->roles }}</p>
        </div>
      </div>
    </div>
    {{-- job info details --}}
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Company: 
              <a 
               href="{{ route('company.show', [$job['company_id'], $job->company]) }}">
                {{ $job->company->cname }}
              </a>
            </li>
            <li class="list-group-item">Address: {{ $job->address }}</li>
            <li class="list-group-item">Employment Type: {{ $job->type }}</li>
            <li class="list-group-item">Position: {{ $job->position }}</li>
            <li class="list-group-item">Posted on: {{ $job->created_at->diffForHumans() }}</li>
            {{-- <li class="list-group-item">Last date: {{ strtotime($job->last_date) }}</li> --}}
          </ul>
        </div>
      </div>
      @if(Auth::check() && Auth::user()->user_type='seeker')
        @if(!$job->checkApplication())
          <apply-component :jobid={{ $job->id }}></apply-component>
        @else
          <button 
            class="btn btn-success btn-block mt-1" 
            disabled>You already applied
          </button>
        @endif
        <favourite-component 
          :jobid={{ $job->id }} 
            :favourited={{ $job->checkSaved()?'true': 'false' }}></favourite-component>
      @endif

      @if(Session::has('message'))
        <div class="alert alert-info">
          {{ Session::get('message') }}
        </div>
      @endif

    </div>

  </div>
</div>
@endsection
