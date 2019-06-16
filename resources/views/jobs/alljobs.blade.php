@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    {{-- filters --}}
    <form action="{{ route('alljobs') }}" method="get">
    <div class="form-inline">
      <div class="form-group">
        <label>Keyword</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Employment Type</label>
        <select class="form-control" name="type">
          <option selected disabled>-select-</option>
          <option value="fulltime">fulltime</option> 
          <option value="parttime">parttime</option> 
          <option value="casual">casual</option> 
        </select>
      </div>
      <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
          <option selected disabled>-select-</option>
          @foreach(App\Category::all() as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-outline-sucess text-success">Search</button>
      </div>
    </div>
    </form>

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
      {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>
  </div>
</div>


  </div>
@endsection
