@extends('master');

@section('content')

<div class="card card-body ">
    <div class="col-md-10 " style="text-align: center">
        <h4 class="mb-0">All Admin Information</h4>
      </div>
    </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr align="left">
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Country</th>
                <th>Address</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $key=>$row)
            <tr align="left">
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone_no}}</td>
                <td>{{$row->country_name}}</td>
                <td>{{$row->address}}</td>
                <td>
                    <a href="{{ URL::to(route('admins.profile',['id' => $row->id]))}}">
                        <i class="fa-solid fa-bars" title="Active Admin"></i>
                      </a>
                    <a href="{{ URL::to(route('admins.allAdminActive',['id' => $row->id]))}}">
                        <i class="fas fa-toggle-on text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Active Admin"></i>
                      </a>
                    <a href="{{ URL::to(route('admins.allAdminDelete',['id' => $row->id]))}}">
                        <i class="fa fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Profile"></i>
                      </a>

                </td>

            </tr>
            @endforeach

        </table>


@endsection
