@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </thead>	
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
                    <td>
                      <i class="fa fa-map-marker"></i> 
                      Address: {{ $job->address }}
                    </td>
                    <td><i class="fa fa-globe"></i> 
                      Date: {{ $job->created_at->diffForHumans() }}
                    </td>
                    <td>
                      {{-- link to each individual job --}}
                      <a href="{{ route('job.show', [$job->id, $job->slug]) }}">
                        <button class="btn btn-success btn-sm">Show</button>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('job.edit', [$job->id]) }}">
                        <button class="btn btn-dark btn-sm">Edit</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
