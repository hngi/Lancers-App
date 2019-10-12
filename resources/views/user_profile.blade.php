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


                @if(($data[0] != null) && ($data[0] != null) && ($data[0]['first_name'] != "none"))
                    <img src="{{ asset($data[0]['profile_picture']) }}" style="width: 100px; height: 100px; border-radius: 10%;" alt="Profile Image">
                    @foreach($data[0] as $key => $value)
                            @if(($key != 'user_id') && ($key != 'created_at') && ($key != 'updated_at')  && ($key != 'timezone') && ($key != 'id') && ($key != 'profile_picture'))

                            <p><strong> {{ucfirst(str_replace("_"," ",$key))}} :  {{ucfirst($value)}}  </p></strong>
                            @endif
                    @endforeach

                 @endif

                 @if(($data[0] != null) && ($data[0] != null) && ($data[0]['first_name'] == "none"))

                 <img src="{{ asset($data[0]['profile_picture']) }}" style="width: 100px; height: 100px; border-radius: 10%;" alt="Profile Image">
                  <h3>User profile details have not been set</h3>
                 @endif

                 @if($data[0] == null)
                 <h3>User profile details have not been set</h3>
                 @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
