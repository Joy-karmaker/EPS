@extends('master');

@section('content')

<div class="container-fluid my-2 py-2">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 margin-tb ">

            <div class="card">
                <div class="card-body" style="text-align: center">
                   <div ><h4> Update User Profile </h4></div>

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
    <form action="{{ route('users.updateUser',['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')


    <div class="container-fluid my-2 py-2">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 margin-tb ">
                <div class="card my-2 ">
                    <div class="card-body" style="text-align: center">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Full Name:</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $user->name  }}">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="col-sm-2 col-form-label">Phone No</label>
                            <!-- <div class="col-sm-4">
                                <input type="text" name="phone_no" class="form-control" value="{{ $user->phone_no}}"  placeholder="Phone Number" >
                                @error('phone_no')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <div class="col-sm-4">
                                <input id="phone_no" name="phone_no" type="tel" class="form-control" value="{{ $user->phone_no}}"  placeholder="Phone Number"><span id="valid-msg" class="hide"></span><span id="error-msg" class="hide"></span>
                                </div>
                        </div>

                        <div class="form-group my-2 row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{$user->email}}" readonly>
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" name="password" class="form-control" value="{{$user->password}}"  placeholder=" Password" >
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

                                 <option value={{$country->id}} {{($country->id==$user->country_id)?'selected':''}} >{{$country->name}}</option>
                                @endforeach
                                </select>
                            @error('country_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-4">
                            <textarea name="city" class="form-control"   placeholder="City"> {{ $user->city }}</textarea>
                        </div>
                    </div>
                        <div class="form-group my-2 row">
                            <label class="col-sm-2 col-form-label">Street</label>
                            <div class="col-sm-4">
                                <textarea name="street" class="form-control" placeholder="Street/Road"> {{ $user->street }} </textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <textarea name="address" class="form-control" placeholder="Address">{{$user->address}} </textarea>
                                @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group my-2 row">
                            <label class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-4">
                                <input type="file" name="image" class="form-control" >
                        <input type="hidden" name="existing_image" class="form-control" value ={{ $user->image }}>
                        <div >
                            @if ($user->image!='')
                            <img src="/Image/{{ $user->image }}" alt="profile_image" height="30" width="80">

                            @else
                            <img src="/Image/demoProfile.jpg" alt="profile_image" height="30" width="80">
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

                                    <a class="btn btn-outline-primary" href="{{ route('users.userProfile') }}"> Back</a>

                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
    </form>
</div>


@endsection
