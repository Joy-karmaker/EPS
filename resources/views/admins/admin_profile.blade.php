@extends('master');

@section('content')

<div class="card card-body ">
    <div class="col-md-10 " style="text-align: center">
        <h4 class="mb-0">Admin Information</h4>
      </div>
    <div class="row gx-4 mb-2">

      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
            @if ($admins->image!='')
            <img src="/Image/{{ $admins->image }}" alt="profile_image" height="100px" width="300px">

            @else
            <img src="/Image/demoProfile.jpg" alt="profile_image" height="25%" width="50%">
            @endif
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">

            {{ $admins->name }}

          </h5>
          <p class="mb-0 font-weight-normal text-sm">
            Admin
          </p>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="row">

        <div class="col-12 col-xl-4">
          <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <a href="{{ route('admins.create') }}">Create Admin
                    <i class="fas fa-user-plus text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Profile"></i>
                </a>

                <a href="{{ route('admins.edit',$admins->id) }}">Edit Admin
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>

                  <a href="{ route('admins.edit') }}">Admin Login
                    <i class="fa fa-sign-in text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="login"></i>
                </a>
                <div class="col-md-4 text-end">

                </div>

              </div>
            </div>
            <div class="card-body p-3">

                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;  {{ $admins->name }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp;  {{ $admins->phone_no }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $admins->email }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Country:</strong> &nbsp;
                        {{ $admins->country_name }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">City:</strong> &nbsp; {{ $admins->city }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Street:</strong> &nbsp; {{ $admins->street }}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp; {{ $admins->address }}</li>

                  </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
