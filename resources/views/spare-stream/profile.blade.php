@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="" style="color: #000;">&nbsp; Editing profile </a>
                    </li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title mb-4" style="font-size: 20px; text-transform: none; padding-top: 0px;">Profile details
                </h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @session('success')
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endsession
        @session('fail')
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    {{ session('fail') }}
                </div>
            </div>
        @endsession
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h5 style="font-size: 20px;"><b>User account information</b></h5>
                    <form action="{{ route('profile.updates') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email*</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password*</label>
                            <input type="password" name="password" class="form-control" placeholder="********"
                                id="exampleInputPassword1">
                            @error('password')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm password*</label>
                            <input type="password" name="password_confirmation" placeholder="********"
                                class="form-control" id="exampleInputPassword1">
                            @error('password_confirmation')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <h6 style="font-size: 20px;">Contact information</h6>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First name*</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('first_name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Last name*</label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('last_name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile*</label>
                            <input type="text" name="mobile" value="{{ $user->phone }}" class="form-control"
                                id="exampleInputPassword1">
                            @error('mobile')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">PayTM Number (for refunds)*</label>
                            <input type="text" name="Paytm" value="{{ $user->paytm_number }}" class="form-control"
                                id="exampleInputPassword1">
                            @error('Paytm')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <h6 style="font-size: 20px;">Shipping address</h6>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Full name*</label>
                            <input type="text" name="ship_full_name" class="form-control"
                                value="{{ $user->shipping_name }}" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('ship_full_name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile*</label>
                            <input type="text" name="ship_mobile" class="form-control"
                                value="{{ $user->phone }}" id="exampleInputPassword1">
                            @error('ship_mobile')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address*</label>
                            <input type="text" name="ship_address" value="{{ $user->ship_address1 }}"
                                class="form-control" id="exampleInputPassword1">
                            @error('ship_address')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Landmark*</label>
                            <input type="text" name="ship_landmark" value="{{ $user->ship_landmark }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('ship_landmark')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">City*</label>
                            <input type="text" name="ship_city" value="{{ $user->ship_city }}"
                                class="form-control" id="exampleInputPassword1">
                            @error('ship_city')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">State/province
                                *</label>
                            <input type="text" name="ship_state" value="{{ $user->ship_state }}"
                                class="form-control" id="exampleInputPassword1">
                            @error('ship_state')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Pincode*</label>
                            <input type="text" name="ship_pincode" value="{{ $user->ship_zip }}"
                                class="form-control" id="exampleInputPassword1">
                            @error('ship_pincode')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" href="" class="btn btn-primary">Save </button>
                        <a href="" class="btn btn-primary">Revert </a>
                    </form>
                </div>

                <div class="col-md-6 mb-5">
                    <h5 style="font-size: 20px;"><b>Profile details</b></h5>
                    <p>On this page you can modify your login credentials and personal data to be used during future
                        purchases.</p>
                    <p>To keep your account secure we recommend to avoid creating passwords that use:</p>
                    <ul style="padding: 0 20px;">
                        <li style="list-style-type: disc; margin-bottom: 20px;">Dictionary words in any language.</li>
                        <li style="list-style-type: disc; margin-bottom: 20px;">Words spelled backwards, common
                            misspellings, and abbreviations.</li>
                        <li style="list-style-type: disc; margin-bottom: 20px;">Sequences or repeated characters.
                            Examples: 12345678, 222222, abcdefg, or adjacent letters on your keyboard (qwerty).</li>
                        <li style="list-style-type: disc; margin-bottom: 20px;">Personal information. Your name,
                            birthday, driver's license, passport number, or similar information.</li>
                    </ul>
                </div>
            </div>
        </div>

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
