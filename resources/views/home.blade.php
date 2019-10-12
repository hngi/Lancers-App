@extends('layouts.master')


@section('sidebar')

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Lan<span class="colorC">c</span>ers </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727367/home.svg" alt=""> Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727365/client.svg" alt=""> Client</a>
        <!-- dropDown Menu -->
      <div class="nav-item dropdown">
        <a href="#" class="nav-link list-group-item list-group-item-action bg-dark" data-toggle="dropdown">
        <img src="https://res.cloudinary.com/samtech/image/upload/v1570727368/lightbulb.svg" alt=""> Project  <svg width="16" height="12" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.54" fill-rule="evenodd" clip-rule="evenodd" d="M10.6 0.600098L6 5.2001L1.4 0.600098L0 2.0001L6 8.0001L12 2.0001L10.6 0.600098Z" fill="white"/>
        </svg>
        </a>
       <div class="dropdown-menu animated fadeInLeft" role="menu">
          <a class="dropdown-item" href="#">Status</a>  
          <a class="dropdown-item" href="#">Overview</a>   
          <a class="dropdown-item" href="#">Collabrators</a>  
          <a class="dropdown-item" href="#">Task</a>  
          <a class="dropdown-item" href="#">Documents</a>  
        </div>
      </div>

        <a href="/dashboard/invoice_list" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727368/notification.svg" alt="">Invoices</a>


        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727368/policy.svg" alt=""> Contract</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727365/approval.svg" alt=""> Proposals</a>
      </div>
    
    <!-- /#sidebar-wrapper -->
</div>

@endsection

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
                    <div class="card-header"><a href='/dashboard/invoice_list' >My Invoices</a></div>

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
