@extends('master');

@section('content')
<!DOCTYPE html>
<html lang="en">


    <div class="container-fluid my-1 py-1">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 margin-tb ">

                <div class="card">
                    <div class="card-body" style="text-align: center">
                       <div ><h4> Create Programme </h4></div>

                    </div>
                  </div>

            </div>
        </div>
    </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
        <form action="{{ route('programmes.storeProgramme') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container-fluid my-2 py-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 margin-tb ">
                        <div class="card my-2 ">
                            <div class="card-body" style="text-align: center">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Programme Name:</label>
                                    <div class="col-sm-6 py-2">
                                        <input type="text" name="name" class="form-control" placeholder="Programme Name" style=" background: #abb7b7;" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group my-2 row">
                                    <div class="col-sm-4">
                                    </div>

                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>


                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>


<script src="../admin/js/core/popper.min.js"></script>
<script src="../admin/js/core/bootstrap.min.js"></script>
<script src="../admin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../admin/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

@endsection
