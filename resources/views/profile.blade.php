@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header"><a href='/dashboard' >Dashboard</a></div>
                    <div class="card-header"><a href='/users/subscriptions' >Subscriptions</a></div>
                    <div class="card-header"><a href='/users/view/subscriptions' >Current Plan</a></div>
                    <div class="card-header"><a href='/dashboard/profile/view' >View Profile</a></div>
                    <div class="card-header"><a href='/dashboard/profile' >Edit Profile</a></div>
                    <div class="card-header"><a href='/users/settings/emails' >Email Settings</a></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>

                <div class="card-body">
                @if(session('editStatus'))

                     <div class="alert alert-success" role="alert">
                          {{ session('editStatus') }}
                        </div>
                @endif

                    @if(session('editErrors'))

                     <div class="alert alert-fail" role="alert">
                         @if(sizeof(session('editErrors') > 1))
                            @foreach(session('editErrors') as $errors)

                                <p style="color:red;">{{$errors}}<p/>

                            @endforeach
                        @endif

                        @if(sizeof(session('editErrors') <= 1))

                                <p style="color:red;">{{session('editErrors')}}<p/>
                        @endif
                        </div>
                @endif


                @if(($data != null) && ($data[3] != null) && ($data[3]['first_name'] != "none"))
                    <img src="{{ asset($data[3]['profile_picture']) }}" style="width: 100px; height: 100px; border-radius: 10%;" alt="Profile Image">
                    @foreach($data[3] as $key => $value)
                            @if(($key != 'user_id') && ($key != 'created_at') && ($key != 'updated_at')  && ($key != 'timezone') && ($key != 'id') && ($key != 'profile_picture'))

                            <p><strong> {{ucfirst(str_replace("_"," ",$key))}} :  {{ucfirst($value)}}  </p></strong>
                            @endif
                    @endforeach

                 @endif

                 @if(($data != null) && ($data[3] != null) && ($data[3]['first_name'] == "none"))

                 <img src="{{ asset($data[3]['profile_picture']) }}" style="width: 100px; height: 100px; border-radius: 10%;" alt="Profile Image">
                 @endif
                </div>


                <div class="card-body">
                        <form method="POST" action="{{ route('Profile-Image') }}" enctype="multipart/form-data">
                            @csrf

                                @if(null !== session('ImageUploadMessage'))
                                    {{session('ImageUploadMessage')}}
                                @endif
                            <div class="form-group row">
                                <label for="pc1" class="col-md-4 col-form-label text-md-right">{{ __('Edit Profile Image') }}</label>
                                <img src="" alt="" id="imge1" style="cursor:pointer">

                                <div class="col-md-6">
                                    <input type="file" id="pc1" onchange="image1(this);" class="form-control @error('name') is-invalid @enderror" name="profileimage" value="" required autocomplete="Profile Image" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0" id="picture_upload" style="display: none;">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit Image') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>



                <div class="card-body">
                    <form method="POST" action="{{ route('edit-profile') }}">
                        @csrf



                        <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Enter First Name') }}</label>

                                  <div class="col-md-6">
                                     <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first name" autofocus>

                                 </div>
                                 </div>

                                  <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Last Name') }}</label>

                                  <div class="col-md-6">
                                     <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last name" autofocus>

                                 </div>
                                 </div>


                                  <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Enter Title') }}</label>

                                    <div class="col-md-6">
                                     <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                 </div>

                                  </div>



                                     <div class="form-group row">
                                 <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Company Name') }}</label>

                                    <div class="col-md-6">
                                     <input id="company_name" type="text" class="form-control @error('name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company name" autofocus>

                                 </div>

                                  </div>



                                     <div class="form-group row">
                                <label for="company_email" class="col-md-4 col-form-label text-md-right">{{ __('Enter Company Email') }}</label>

                                    <div class="col-md-6">
                                     <input id="company_email" type="text" class="form-control @error('name') is-invalid @enderror" name="company_email" value="{{ old('company_email') }}" required autocomplete="company email" autofocus>

                                 </div>

                                  </div>



                                     <div class="form-group row">
                                <label for="company_address" class="col-md-4 col-form-label text-md-right">{{ __('Enter Company Address') }}</label>

                                    <div class="col-md-6">
                                     <input id="company_address" type="text" class="form-control @error('name') is-invalid @enderror" name="company_address" value="{{ old('company_address') }}" required autocomplete="company address" autofocus>

                                 </div>

                                  </div>




                                     <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Enter Phone Number') }}</label>

                                    <div class="col-md-6">
                                     <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone number" autofocus>

                                 </div>

                                  </div>




                                     <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Enter Street') }}</label>

                                    <div class="col-md-6">
                                     <input id="street" type="text" class="form-control @error('name') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>

                                 </div>

                                  </div>





                                     <div class="form-group row">
                                <label for="street_number" class="col-md-4 col-form-label text-md-right">{{ __('Enter Street Number') }}</label>

                                    <div class="col-md-6">
                                     <input id="street_number" type="text" class="form-control @error('name') is-invalid @enderror" name="street_number" value="{{ old('street_number') }}" required autocomplete="street number" autofocus>

                                 </div>

                                  </div>




                                     <div class="form-group row">
                                <label for="contacts" class="col-md-4 col-form-label text-md-right">{{ __('Enter Contacts') }}</label>

                                    <div class="col-md-6">
                                     <input id="contacts" type="text" class="form-control @error('name') is-invalid @enderror" name="contacts" value="{{ old('contacts') }}" required autocomplete="contacts" autofocus>

                                 </div>

                                  </div>




                                     <div class="form-group row">
                                <label for="currency_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Currency') }}</label>

                                    <div class="col-md-6">

                                 <select id="currency_id" name="currency_id">
                                 <option value="">Select Currency</option>
                                 @if($data != null)

                                 @foreach($data[1] as $dataCurrency)
                                  <option value="{{ $dataCurrency['id'] }}">{{ $dataCurrency['name'] }}</option>
                                 @endforeach

                             @endif
                                 </select>
                                 </div>

                                  </div>

                                  <div class="form-group row">
                                  <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Enter City') }}</label>

                                    <div class="col-md-6">
                                     <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                     </div>

                                  </div>



                                     <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Enter Zipcode') }}</label>

                                    <div class="col-md-6">
                                     <input id="zipcode" type="text" class="form-control @error('name') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="title" autofocus>

                                 </div>

                                  </div>




                                    <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Country') }}</label>

                                    <div class="col-md-6">

                                 <select id="country_id" name="country_id">
                                 <option value="">Select a country</option>
                                 @if($data != null)

                                        @foreach($data[0] as $dataCountry)
                                         <option value="{{ $dataCountry['id'] }}">{{ $dataCountry['name'] }}</option>
                                        @endforeach

                                    @endif
                                 </select>
                                 </div>

                                  </div>


                                    <div class="form-group row">
                                <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('Select State') }}</label>

                                    <div class="col-md-6">

                                 <select id="state_id" name="state_id">
                                 <option value="">Select State</option>
                                 @if($data != null)

                                 @foreach($data[2] as $dataState)
                                  <option value="{{ $dataState['id'] }}">{{ $dataState['name'] }}</option>
                                 @endforeach

                             @endif
                                 </select>
                                 </div>

                                  </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
