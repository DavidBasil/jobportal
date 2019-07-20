@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    {{-- filters --}}
    <form action="{{ route('alljobs') }}" method="get">
    <div class="form-inline w-100">
      <div class="row w-100">

        <div class="col-md-2">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="keyword">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <select class="form-control" name="type">
              <option value="" selected disabled>hours</option>
              <option value="fulltime">fulltime</option> 
              <option value="parttime">parttime</option> 
              <option value="casual">casual</option> 
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <select name="category_id" class="form-control">
              <option value="" selected disabled>category</option>
              @foreach(App\Category::all() as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="address">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <button type="submit" class="btn btn-outline-success text-success mt-0">Search</button>
          </div>
        </div>

      </div>
    </div>
    </form>
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
    <div class="mx-auto">
      {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>
  </div>
</div>


  </div>
@endsection
