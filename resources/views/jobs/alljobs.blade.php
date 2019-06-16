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
    <div class="mx-auto">
    {{ $jobs->links() }}
    </div>
  </div>
</div>


</div>
@endsection
