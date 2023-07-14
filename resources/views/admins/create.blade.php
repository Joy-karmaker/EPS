<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Registration Form</title>
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{-- <link id="pagestyle" href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> --}}
    {{-- <link href="../admin/bootstrap/css/bootstrap.min.css"> --}}


</head>

<body>
    <div class="container-fluid my-2 py-2">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 margin-tb ">

                <div class="card">
                    <div class="card-body" style="text-align: center">
                       <div ><h4> Admin Registration Form </h4></div>

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
        <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="container-fluid my-2 py-2">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 margin-tb ">
                        <div class="card my-2 ">
                            <div class="card-body" style="text-align: center">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Full Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label">Phone No</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="phone_no" class="form-control" value="{{ old('phone_no') }}"  placeholder="Phone Number" >
                                        @error('phone_no')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}"  placeholder=" Password" >
                                        @error('password')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-4">
                                       <select class="form-select" name="country_id"  value="{{ old('country_id') }}" >
                                        <option value="">Select One</option>
                                        @foreach($countries as $country)
                                        <option value={{$country->id}} {{ old('country_id') == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
                                       @endforeach
                                    </select>
                                       @error('country_id')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror
                                  </div>

                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-4">
                                    <textarea name="city" class="form-control"   placeholder="City"> {{ old('city') }}</textarea>
                                </div>
                            </div>
                                <div class="form-group my-2 row">
                                    <label class="col-sm-2 col-form-label">Street</label>
                                    <div class="col-sm-4">
                                        <textarea name="street" class="form-control" placeholder="Street/Road"> {{ old('street') }} </textarea>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-4">
                                        <textarea name="address" class="form-control" placeholder="Address">{{ old('address') }} </textarea>
                                        @error('address')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group my-2 row">
                                    <label class="col-sm-2 col-form-label">Upload Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="image" class="form-control"/>
                                    </div>

                                    <div class="col-sm-4">

                                    </div>
                                </div>
                                <div class="form-group my-2 row">
                                    <div class="col-sm-4">
                                    </div>

                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>

                                            <a class="btn btn-outline-primary" href="{{ route('start') }}"> Back</a>

                                        </div>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>

</body>

</html>
<script src="../admin/js/core/popper.min.js"></script>
<script src="../admin/js/core/bootstrap.min.js"></script>
<script src="../admin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../admin/js/plugins/smooth-scrollbar.min.js"></script>
