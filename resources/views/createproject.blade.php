@extends('layouts.master')

@section('styles')
    @include('layouts.style')
@endsection
@section('sidebar')
@section('nav')
    @include('layouts.nav')
@endsection
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Lan<span class="colorC">c</span>ers </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727367/home.svg" alt=""> Dashboard</a>
        <a href="/dashboard/client" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727365/client.svg" alt=""> Client</a>
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

        <a href="/dashboard/invoice_list" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727368/invoice.svg" alt="">Invoices</a>


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
                <div class="card-header">Create project</div>
                <div class="card-body">       
                    <form method="POST" action="/projects">
                        @csrf
                        <div class="row form-group">                            
                            <label for="" class="col-md-4 col-form-label text-md-right">Enter project name</label>
                            <div class="col-md-6">
                                <input name="title" type="text" class="form-control" autofocus>
                            </div>
                            <label for="" class="col-md-4 col-form-label text-md-right">Enter project description</label>
                            <div class="col-md-6">
                                <input name="description" type="text" class="form-control" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <br>
                                <button  class="btn btn-primary btn-block">Create Project</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection