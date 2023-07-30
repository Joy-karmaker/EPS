<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Admin Profile</title>
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
    {{-- <link id="pagestyle" href="../admin/css/material-dashboard.css?v=3.1.0" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('/')}}/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> --}}
    {{-- <link href="../admin/bootstrap/css/bootstrap.min.css"> --}}
       {{-- <link id="pagestyle" href="../admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> --}}
</head>

<body>
    <div class="container-fluid my-2 py-2">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 margin-tb ">

                <div class="card">
                    <div class="card-body" style="text-align: center">
                       <div ><h4> Update Admin Profile </h4></div>

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
        <form action="{{ route('admins.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


        <div class="container-fluid my-2 py-2">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 margin-tb ">
                    <div class="card my-2 ">
                        <div class="card-body" style="text-align: center">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $admin->name  }}">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">Phone No</label>
                                <!-- <div class="col-sm-4">
                                    <input type="text" name="phone_no" class="form-control" value="{{ $admin->phone_no}}"  placeholder="Phone Number" >
                                    @error('phone_no')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <div class="col-sm-4">
                                    <input id="phone_no" type="tel" class="form-control" value="{{ $admin->phone_no}}"  placeholder="Phone Number"><span id="valid-msg" class="hide"></span><span id="error-msg" class="hide"></span>
                                    </div>
                            </div>

                            <div class="form-group my-2 row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{$admin->email}}">
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-4">
                                    <input type="password" name="password" class="form-control" value="{{$admin->password}}"  placeholder=" Password" >
                                    @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group my-2 row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-4">
                                    <select class="form-select" name="country_id">

                                        @foreach($countries as $country)

                                     <option value={{$country->id}} {{($country->id==$admin->country_id)?'selected':''}} >{{$country->name}}</option>
                                    @endforeach
                                    </select>
                                @error('country_id')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <label class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-4">
                                <textarea name="city" class="form-control"   placeholder="City"> {{ $admin->city }}</textarea>
                            </div>
                        </div>
                            <div class="form-group my-2 row">
                                <label class="col-sm-2 col-form-label">Street</label>
                                <div class="col-sm-4">
                                    <textarea name="street" class="form-control" placeholder="Street/Road"> {{ $admin->street }} </textarea>
                                </div>
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-4">
                                    <textarea name="address" class="form-control" placeholder="Address">{{$admin->address}} </textarea>
                                    @error('address')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group my-2 row">
                                <label class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="col-sm-4">
                                    <input type="file" name="image" class="form-control" >
                            <input type="hidden" name="existing_image" class="form-control" value ={{ $admin->image }}>
                            <div >
                                @if ($admin->image!='')
                                <img src="/Image/{{ $admin->image }}" alt="profile_image" height="10%" width="30%">

                                @else
                                <img src="/Image/demoProfile.jpg" alt="profile_image" >
                                @endif

                            </div>
                                </div>

                                <div class="col-sm-4">

                                </div>
                            </div>
                            <div class="form-group my-2 row">
                                <div class="col-sm-4">
                                </div>

                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>

                                        <a class="btn btn-outline-primary" href="{{ route('admins.index') }}"> Back</a>

                                    </div>
                                </div>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
  var input = document.querySelector("#phone_no");

  window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
  });
</script>

<script>
    const input_ph = document.querySelector("#phone_no");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    const iti = window.intlTelInput(input_ph, {
    utilsScript: "/intl-tel-input/js/utils.js?1687509211722"
    });

    const reset = () => {
    input_ph.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
    };

    // on blur: validate
    input_ph.addEventListener('blur', () => {
    reset();
    if (input_ph.value.trim()) {
        if (iti.isValidNumber()) {
        validMsg.classList.remove("hide");
        } else {
        input_ph.classList.add("error");
        const errorCode = iti.getValidationError();
        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide");
        }
    }
    });


    // on keyup / change flag: reset
    input_ph.addEventListener('change', reset);
    input_ph.addEventListener('keyup', reset);
</script>
