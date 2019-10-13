@extends('layouts.master')  
@section('styles')
  
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!-- <link rel="stylesheet" href="style/project.css"> -->
    <style type="text/css">
        /*Main page style by message*/

        @import url(http://fonts.googleapis.com/css?family=Open+Sans);

        :root{
            --primary-color: #091429;
            --secondary-color: #0ABAB5;
            --dark-color: #262626;
            --light-color: #B1B1B1;
        }


           /****************************/
          /*------- main styles ------*/
         /****************************/


        .text-primary{
            color: var(--primary-color) !important;
        }
        .text-secondary{
            color: var(--secondary-color) !important;
        }
        .text-dark{
            color: var(--dark-color) !important;
        }
        .text-light{
            color: var(--light-color) !important;
        }
        .bg-primary{
            background-color: var(--primary-color) !important;
        }
        .bg-secondary{
            background-color: var(--secondary-color) !important;
        }
        .bg-light{
            background-color: var(--light-color) !important;
        }
        .bg-dark{
            background-color: var(--dark-color) !important;
        }
        .btn{
            border: none !important;
            display: inline-block;
            position: relative;
            overflow: hidden;
            transition: all ease-in-out .5s;
        }
        .btn::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 25%;
            height: 100%;
            width: 40%;
            background-color: #000;
            border-radius: 50%;
            opacity: 0;
            pointer-events: none;
            transition: all ease-in-out 1s;
            transform: scale(5, 5);
        }
        .btn:active::after {
            padding: 0;
            margin: 0;
            opacity: .2;
            transition: 0s;
            transform: scale(0, 0);
        }
        .btn-primary{
            background-color: var(--primary-color) !important;
        }
        .btn-secondary{
            background-color: var(--secondary-color) !important;
        }
        .btn-primary-outline{
            background-color: transparent !important;
            color: var(--primary-color)  !important;
            border: 1px solid var(--primary-color)  !important;
        }
        .btn-secondary-outline{
            background-color: transparent !important;
            color: var(--secondary-color)  !important;
            border: 2px solid var(--secondary-color)  !important;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-primary-outline:hover, .btn-secondary-secondary:hover{
            border-color: inherit !important;
            opacity: 0.8 !important;
        }

        /*------Nav bar---------*/
        a,
        a:hover,
        a:focus {
          color: inherit;
          text-decoration: none;
          transition: all 0.3s;
        }
        .navbar {
          padding-top: 0px;
          padding-bottom: 0px;
          background-color: #fff;
          border: none;
          border-radius: 0;
          margin-bottom: 10px;
          box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .navbar-btn {
          box-shadow: none;
          outline: none !important;
          border: none;
        }
        .navbar-nav .nav-item .nav-link:hover{
          transition: 0.25s;
          background-color: #ecf3ff;
        }
        .line {
          width: 100%;
          height: 1px;
          border-bottom: 1px dashed #ddd;
          margin: 40px 0;
        }

        .wrapper #content{

        }
        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */
        .wrapper {
          display: flex;
          width: 100%;
          align-items: stretch;
          perspective: 1500px;
        }
        #sidebar {
          min-width: 250px;
          max-width: 250px;
          background: var(--primary-color);
          color: #fff;
          transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
          transform-origin: bottom left;
        }
        #sidebar.active {
          margin-left: -250px;
          transform: rotateY(100deg);
        }
        #sidebar .sidebar-header {
          padding: 20px;
          background: var(--primary-color);
        }
        #sidebar ul.components {
          padding: 20px 0;
          border-bottom: 1px solid var(--primary-color);
        }
        #sidebar ul p {
          color: #fff;
          padding: 10px;
        }
        #sidebar ul li a {
          padding: 10px;
          font-size: 1em;
          font-weight: 600;
          display: block;
          transition: 0.4;
        }
        #sidebar ul li a:hover {
          color: #ffffff;
          background: rgba(19, 41, 82, 1);
        }
        #sidebar ul li a img {
            margin-top: -4px !important;
            margin-left: 4px;
            margin-right: 4px;
        }
        #sidebar.active ul li a span {
            vertical-align: text-bottom !important;
        }
        #sidebar ul li.active > a,
        a[aria-expanded="true"] {
          color: #fff;
          background: rgba(19, 41, 82, 1);
        }
        a[data-toggle="collapse"] {
          position: relative;
        }
        .dropdown-toggle::after {
          display: block;
          position: absolute;
          top: 50%;
          right: 20px;
          transform: translateY(-50%);
        }
        ul ul a {
          font-size: 0.9em !important;
          padding-left: 30px !important;
          background: rgba(19, 41, 82, 1);;
        }
        ul.CTAs {
          padding: 20px;
        }
        ul.CTAs a {
          text-align: center;
          font-size: 0.9em !important;
          display: block;
          border-radius: 5px;
          margin-bottom: 5px;
        }
        a.download {
          background: #fff;
          color: #7386D5;
        }
        a.article,
        a.article:hover {
          background: rgba(19, 41, 82, 1) !important;
          color: #fff !important;
        }
        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */
        #content {
          width: 100%;
          min-height: 100vh;
          transition: all 0.3s;
        }
        #sidebarCollapse {
          width: 40px;
          height: 40px;
          background: #f5f5f5;
          cursor: pointer;
        }
        #sidebarCollapse span {
          width: 80%;
          height: 2px;
          margin: 0 auto;
          display: block;
          background: #555;
          transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
          transition-delay: 0.2s;
        }
        #sidebarCollapse span:first-of-type {
          transform: rotate(45deg) translate(2px, 2px);
        }
        #sidebarCollapse span:nth-of-type(2) {
          opacity: 0;
        }
        #sidebarCollapse span:last-of-type {
          transform: rotate(-45deg) translate(1px, -1px);
        }
        #sidebarCollapse.active span {
          transform: none;
          opacity: 1;
          margin: 5px auto;
        }

        .alert.alert-primary.py-0.px-2.small.m-0.pending{
            color: #F67A06;
            font-weight: bold;
            background-color: rgba(201, 133, 70,0.3);
            border-color: rgba(201, 133, 70,0.3);
        }

        .alert.alert-primary.py-0.px-2.small.m-0.active{
            color: #179615;
            font-weight: bold;
            background-color: #76D874;
            border-color:  #76D874;
        }
        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */
        @media (max-width: 768px) {
          #sidebar {
            margin-left: -250px;
            transform: rotateY(90deg);
          }
          #sidebar.active {
            margin-left: 0;
            transform: none;
          }
          #sidebarCollapse span:first-of-type,
          #sidebarCollapse span:nth-of-type(2),
          #sidebarCollapse span:last-of-type {
            transform: none;
            opacity: 1;
            margin: 5px auto;
          }
          #sidebarCollapse.active span {
            margin: 0 auto;
          }
          #sidebarCollapse.active span:first-of-type {
            transform: rotate(45deg) translate(2px, 2px);
          }
          #sidebarCollapse.active span:nth-of-type(2) {
            opacity: 0;
          }
          #sidebarCollapse.active span:last-of-type {
            transform: rotate(-45deg) translate(1px, -1px);
          }
        }

        /* ---------------------------------------------------
            Table
        ----------------------------------------------------- */
        table.project-table{
          border-collapse:separate; 
          border-spacing: 0 1em;
        }

        table.project-table tbody tr{
          padding-bottom: 10px !important;
        }

        table.project-table tbody tr td span.text-small{
          font-size: 8px;
        } 

        table.project-table tbody tr td, table.project-table thead tr th {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dropleft .dropdown-toggle::before{
          display: none;
        }

        /*------------floating button---------*/
        #add-something{
          position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 12;
        }
    </style>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>  

@endsection
@section('nav')
    @include('layouts.nav')
@endsection


@section('sidebar')


<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Lan<span class="colorC">c</span>ers </div>
      <div class="list-group list-group-flush">
        <a href="/dashboard" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727367/home.svg" alt=""> Dashboard</a>
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

        <a href="/dashboard/invoice_list" class="list-group-item list-group-item-action bg-dark colorC2"><svg class="imgSvg" width="20.5" height="20.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
        <path d="M21.3143 0H7.29379C6.49144 0 5.83864 0.652795 5.83864 1.45515V4.71151C3.17894 5.47266 1.22656 7.92604 1.22656 10.8269C1.22656 13.7278 3.17889 16.1812 5.83864 16.9423V22.545C5.83864 23.3473 6.49144 24.0001 7.29379 24.0001H18.7513C18.8872 24.0001 19.0175 23.9461 19.1137 23.85L22.6193 20.3443C22.7154 20.2482 22.7694 20.1178 22.7694 19.9819V1.45515C22.7694 0.652795 22.1167 0 21.3143 0ZM7.29379 1.02503H21.3143C21.5515 1.02503 21.7444 1.21797 21.7444 1.45515V3.00191H6.86367V1.45515C6.86367 1.21797 7.05662 1.02503 7.29379 1.02503ZM2.25159 10.8269C2.25159 7.88538 4.64463 5.49233 7.58611 5.49233C10.5276 5.49233 12.9206 7.88538 12.9206 10.8269C12.9206 13.7683 10.5276 16.1614 7.58611 16.1614C4.64463 16.1614 2.25159 13.7683 2.25159 10.8269ZM6.86367 22.5449V17.1452C7.10089 17.1721 7.34187 17.1865 7.58616 17.1865C9.49637 17.1865 11.2124 16.3397 12.3791 15.0021H15.5194C15.8025 15.0021 16.0319 14.7726 16.0319 14.4896C16.0319 14.2065 15.8025 13.9771 15.5194 13.9771H13.1091C13.5549 13.1985 13.8405 12.3172 13.9215 11.3783H15.5194C15.8024 11.3783 16.0319 11.1488 16.0319 10.8658C16.0319 10.5827 15.8024 10.3532 15.5194 10.3532H13.928C13.8587 9.41637 13.5853 8.53544 13.1526 7.75451H15.5193C15.8024 7.75451 16.0318 7.52506 16.0318 7.242C16.0318 6.95895 15.8024 6.72949 15.5193 6.72949H12.4455C11.2781 5.34702 9.53298 4.46726 7.58602 4.46726C7.34172 4.46726 7.10074 4.48161 6.86352 4.50855V4.02694H21.7443V19.4693H19.6938C18.8914 19.4693 18.2387 20.1221 18.2387 20.9244V22.975H7.29379C7.05662 22.975 6.86367 22.7821 6.86367 22.5449ZM19.2638 22.2501V20.9244C19.2638 20.6873 19.4568 20.4944 19.6939 20.4944H21.0196L19.2638 22.2501Z" fill="#0ABAB5"/>
        <path d="M17.534 7.75452H19.236C19.5191 7.75452 19.7485 7.52506 19.7485 7.242C19.7485 6.95895 19.5191 6.72949 19.236 6.72949H17.534C17.2509 6.72949 17.0215 6.95895 17.0215 7.242C17.0215 7.52506 17.2509 7.75452 17.534 7.75452Z" fill="#0ABAB5"/>
        <path d="M17.534 11.379H19.236C19.5191 11.379 19.7485 11.1496 19.7485 10.8665C19.7485 10.5835 19.5191 10.354 19.236 10.354H17.534C17.2509 10.354 17.0215 10.5835 17.0215 10.8665C17.0215 11.1496 17.2509 11.379 17.534 11.379Z" fill="#0ABAB5"/>
        <path d="M17.534 15.0026H19.236C19.5191 15.0026 19.7485 14.7731 19.7485 14.4901C19.7485 14.207 19.5191 13.9775 19.236 13.9775H17.534C17.2509 13.9775 17.0215 14.207 17.0215 14.4901C17.0215 14.7731 17.2509 15.0026 17.534 15.0026Z" fill="#0ABAB5"/>
        <path d="M19.2327 18.6261C19.5158 18.6261 19.7452 18.3966 19.7452 18.1136C19.7452 17.8305 19.5158 17.6011 19.2327 17.6011H14.4383C14.1552 17.6011 13.9258 17.8305 13.9258 18.1136C13.9258 18.3966 14.1552 18.6261 14.4383 18.6261H19.2327Z" fill="#0ABAB5"/>
        <path d="M11.5646 8.24182L10.9394 7.61656C10.771 7.44821 10.5471 7.35547 10.309 7.35547C10.0708 7.35547 9.847 7.44821 9.6786 7.61656L6.399 10.8962L5.49244 9.98959C5.32409 9.82129 5.1002 9.72855 4.8621 9.72855C4.624 9.72855 4.40011 9.82129 4.23176 9.98964L3.60635 10.615C3.25881 10.9626 3.25881 11.5282 3.6064 11.8757L5.76856 14.0379C5.93696 14.2063 6.16086 14.299 6.399 14.299H6.39905C6.63715 14.299 6.86105 14.2063 7.02935 14.038L11.5647 9.5026C11.9122 9.15502 11.9122 8.5894 11.5646 8.24182ZM6.39896 13.2187L4.42559 11.2453L4.86205 10.8089L6.03654 11.9834C6.23671 12.1835 6.5612 12.1835 6.76138 11.9834L10.309 8.43575L10.7455 8.87221L6.39896 13.2187Z" fill="#0ABAB5"/>
        </g>
        <defs>
        <clipPath id="clip0">
        <rect width="20.5" height="20.5" fill="white"/>
        </clipPath>
        </defs>
        </svg> invoice </a> 

        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727368/policy.svg" alt=""> Contract</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727365/approval.svg" alt=""> Proposals</a>
      </div>
    
    <!-- /#sidebar-wrapper -->
</div>
@endsection

@section('content')
<section class="">
             <button style="width: 8rem;
              background-color: #0ABAB5;
              color: #fff;padding: 6px 0;border:0;margin:16px" id="create">Create Project</button>
<br>




<!--the new design-->
<div class="container-fluid">
<h4 class="mt-0 text-primary">PROJECTS</h4><br>
<div class="">
<div class="">
<form class="form-inline">
<select class="form-control status">
<option value="All">All</option>
<option value="Completed">Completed</option>
<option value="Pending">Pending</option>
<option value="Active">Active</option>
</select>
</form>
</div>
</div>
<div class="table-responsive">
<table class="table project-table table-borderless">
<thead>
<tr>
<th scope="col">Date</th>
<th scope="col">Title</th>
<th scope="col">Start Date</th>
<th class="text-right" scope="col">Paid</th>
<th class="text-right" scope="col">Due</th>
<th scope="col">Status</th>
<th scope="col"> </th>
</tr>
</thead>
<tbody>
  @foreach($projects as $project)

<tr class="py-2">
<td scope="row" class="rounded-left border border-right-0">
<span class="text-small text-muted mr-2">
<i class="fas fa-circle"></i>
</span> 
<span class="">{{$project->invoice["id"]}}</span>
</td>
<td class="border-top border-bottom titles">{{$project["client_name"]}}</td>
<td class="border-top border-bottom text-left">{{$project["title"]}}</td>

<td class="border-top border-bottom text-right">{{$project->invoice["issue_date"]}}</td>

<td class="border-top border-bottom text-right">
<span class="alert alert-primary py-0 px-2 small m-0 {{$project->invoice['status']=='unpaid'?'Unpaid':'Paid'}}">
  {{$project->invoice["status"]}}</span>
</td>

<td class="border-top border-bottom">
 ₦{{$project->invoice["amount"]}}
</td>

<td class="rounded-right border border-left-0">
<div class="dropdown dropleft">
<a class="btn btn-white btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item text-success" href="#"><i class="fas fa-binoculars"></i> View</a>
  <a class="dropdown-item text-secondary" href="#"><i class="fas fa-edit"></i> Edit</a>
  <a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
</div>
</div>
</td>
</tr>

  @endforeach


</tbody>
</table>
</div>
</div>
</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });

        const searchBox = document.querySelector('.searchBox');
        const status = document.querySelector('.status');
        const filterNames =()=>{
            const titles = document.querySelectorAll('.titles');
            const searchBoxValue = searchBox.value.toLowerCase();
        
            titles.forEach(title=>{
                if(!title.textContent.toLowerCase().includes(searchBoxValue)){
                    title.parentElement.style.display = "none"
                }else{
                    title.parentElement.style.display = "";
                }
            })
        }

        const filterStatus =()=>{
            const statusText = document.querySelectorAll('.alert-primary')
            
            statusText.forEach(text => {
                if(status.value !== 'All'){
                    if(status.value === text.textContent){
                        text.parentElement.parentElement.style.display = ""
                    }else{
                        text.parentElement.parentElement.style.display = "none"
                    }
                 }else{
                    text.parentElement.parentElement.style.display = ""
                 }
            })  
        }

        searchBox.addEventListener('keyup', filterNames);

        status.addEventListener('change', filterStatus);
           
    });
</script>
@endsection