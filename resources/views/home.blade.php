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

                    You are logged in!
                </div>


                @if(session('editStatus') && session('newName'))
                     <div class="alert alert-success" role="alert">
                          {{ session('editStatus') }} {{ session('newName') }}
                        </div>
                @endif
                 @if(session('editErrors'))
                     <div class="alert alert-fail" role="alert">
                          {{ session('editErrors') }}
                        </div>
                @endif

                <p>User Name:  {{ Auth::user()->name }}</p>


            </div>
        </div>
    </div>
</div>
@endsection
