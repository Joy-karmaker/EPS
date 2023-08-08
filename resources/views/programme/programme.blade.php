@extends('master');

@section('content')

<div class="card card-body ">
    <div class="col-md-10 " style="text-align: center">
        <h4 class="mb-0">All Programme Information</h4>
      </div>
    </div>
    <br>

        <button type="button" class="btn btn-outline-success"> <a href="{{ URL::to(route('programmes.createProgramme'))}}">Create Programme </a></button>


      <table  class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr align="left">
                <th>Programme Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programmes as $key=>$row)
            <tr align="left">
                <td>{{$row->name}}</td>

                <td>
                  <a href="{{ URL::to(route('programmes.editProgramme',['id' => $row->id]))}}">
                        <i class="fa-solid fa-bars" title="Edit Programme"></i>
                      </a>

                    <a href="{{ URL::to(route('programmes.deleteProgramme',['id' => $row->id]))}}">
                        <i class="fa fa-trash text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Programme"></i>
                      </a>

                </td>

            </tr>

            @endforeach

        </table>
        <br>
        <br>
        {{ $programmes->links() }}
@endsection
