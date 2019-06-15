@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <table class="table">
            @foreach($applicants as $applicant)
              <div class="card-header">
                <a 
                  href="{{ route('job.show', [$applicant->id, $applicant->slug]) }}">
                  {{ $applicant->title }}
                </a>
              </div>
              <div class="card-body">
                @foreach($applicant->users as $user)
                  <tbody>
                    <tr>
                      <th>{{ $user->name }}</th>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->profile->address }}</td>
                      <td>{{ $user->profile->gender }}</td>
                      <td>
                        <a
                          href="{{ Storage::url($user->profile->resume) }}">
                          Resume
                        </a>
                      </td>
                      <td>
                        <a 
                          href="{{ Storage::url($user->profile->cover_letter) }}">
                          Cover letter
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
              </div>
            @endforeach
        </div>
          </table>
      </div>
    </div>
  </div>
@endsection
