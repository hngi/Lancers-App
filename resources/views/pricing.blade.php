@extends('layouts.app')

@section('styles')
 <style>
 	:root{
				--primary-color: #091429;
				--secondary-color: #0ABAB5;
				--dark-color: #262626;
				--light-color: #B1B1B1;
			}
			   /****************************/
			  /*------- main styles ------*/
			 /****************************/
			body{
				font-family: 'Open Sans', sans-serif !important;
				font-size: calc(14px + (26 - 14) * ((100vw - 300px) / (1600 - 300)))  !important;
			}

			h1,
			.h1{
			  	font-weight: 600 !important;
				font-size: 3.5rem;
			  	font-size: calc(38px + 4 * (100vw - 767px) / 700);
			  	line-height: 120% !important;
				vertical-align: top !important;
			}
			h2,
			.h2 {
			  	font-size: 3.2rem;
			  	font-size: calc(28px + 4 * (100vw - 767px) / 700);
			  	font-weight: 700;
			}
			h3,
			.h3 {
			  	font-size: 2rem !important;
			  	font-size: calc(24px + 4 * (100vw - 767px) / 700) !important;
			  	font-weight: 600 !important;
				line-height: 150% !important;
			}
			h4,
			.h4 {
			  font-size: 1.6rem;
			}
			h5,
			.h5 {
			  	font-size: 1.2rem;
				font-weight: 700 !important;
				line-height: 150% !important;
			}
			h6,
			.h6 {
			  font-size: 1.4rem;
			}
			p{
				font-size: 16px !important;
				font-weight: normal;
				line-height: 32px;
			}
			p.bold{
				font-size: 18px !important;
				font-weight: 700;
				line-height: 32px;
			}
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


 /*------Navbar------------*/

			.navbar-main {
			    background-color: var(--primary-color);
			}
			.navbar-main .navbar-brand,
			.navbar-main .navbar-text {
			    color: rgba(255, 255, 255, 0.9);
			}
			.navbar-main .navbar-nav .nav-link {
				font-size: 1rem;
			    color: rgba(255, 255, 255, 0.8);
			}
			.navbar-main .nav-item.active .nav-link,
			.navbar-main .nav-item:hover .nav-link {
			    color: #ffffff;
			}

			/* for navbar toggler design */
			.icon-bar {
				width: 22px; 
				height: 2px;
				background-color: #B6B6B6;
				display: block;
				transition: all 0.2s;
				margin-top: 4px
			}
			.navbar-toggler {
			  border: none;
			  background: transparent !important;
			}
			.navbar-toggler:focus{
				outline: none !important;
			}

			/* navbar toggler animation*/

			.navbar-toggler .top-bar {
			  transform: rotate(45deg);
			  transform-origin: 10% 10%;
			} 
			.navbar-toggler .middle-bar {
			  opacity: 0;
			} 
			.navbar-toggler .bottom-bar {
			  transform: rotate(-45deg);
			  transform-origin: 10% 90%;
			}
			.navbar-toggler.collapsed .top-bar {
			  transform: rotate(0);
			} 
			.navbar-toggler.collapsed .middle-bar {
			  opacity: 1;
			}
			.navbar-toggler.collapsed .bottom-bar {
			  transform: rotate(0);
			}

			

	.pricing{
			width: 100%;
			padding: 70px;
	}


	.pricing .title-header{
			text-align: center
	}

	.pricing .title-header h1{ 
			font-size: 65px;
			padding-left: 160px;
			padding-right: 160px;
	}
	.pricecol{
			height: 450px;
			border: 1px solid rgb(197, 132, 132);
			position: relative;
	}
	.pricetext{
			text-align: center;
			font-size: 30px;

	}
	.pricenumber{
			text-align: center;
			font-size: 48px;
			
	}

	.price-button{
			width: 100%;
			position: absolute;
			bottom: 2%;
			left:0;
	}

	.pricelist{
			list-style: none;
	}
	.pricelist li{
			margin: 5px auto
	}
	.pricelist li span{
			margin: auto 5px
	}

	.price-button a{
			background: #0ABAB5;
			color: #fff;
			border: none
	}


	.price-button a:hover{
			background: rgb(9, 155, 150);
	}

	.pricenumber::before{
			font-size: 17px;
			content: '\0024';
			position: relative;
			left: -2px;
			top: -25px
	}

	.pricenumber{
			position: relative;
	}

	.pricenumber p{
			font-size: 17px;
			display: inline;
	}
	article {
			background-color:#091429;
			padding: 25px;
	}

	footer {
			background-color: white;
			padding: 25px;
	}

	.enter-div {
			text-align: center;
			color: white;
			font-weight: normal;
			font-style: normal;
			
	}

	#enter-line {
			line-height: 65px;
	}

	#lancer {

	font-style: normal;
	font-weight: normal;
	font-family: 'Pacifico', cursive;
	font-size: 20px;
	}

	#btn-sub {
			background: #0ABAB5;
			border-radius: 4px;
			color: #FFFFFF;
	}

	#email-input {
	background: #FFFFFF;
	border: 1px solid #C4C4C4;
	box-sizing: border-box;
	border-radius: 2px;
	color: black;
	}

	.btn {
	background: #091429;
	border: 1px solid #0ABAB5 ;
	color: #0ABAB5;
	box-sizing: border-box;
	border-radius: 6px;
	}

	.link {
			color: black;
	}


	@media only screen and (max-width: 600px) {
			.pricing .title-header h1{
					padding: 0;
					font-size: 35px
			}
			.pricing{
					padding: 20px;
			}

			

			.pricecol{
					margin: 20px auto
			}
		}

		/*-----------footer list--------*/

			.list-unstyled li a{
				font-size: 17px !important;
				transition: 0.25s !important;
				font-style: normal;
				font-weight: normal;
			}

			.list-unstyled li a:hover{
				color: gray !important;
				text-decoration: none;
			}
 </style>
@endsection

@section('header')
    	<header>
			<nav class="navbar navbar-expand-lg navbar-main">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img src="{{ asset('images/svg/logo-white.svg') }}" class="img img-responsive" height="30" width="auto">
					</a>
					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
						<!-- <span class="navbar-toggler-icon"><i class="fa fa-bars fa-lg py-1 text-white"></i></span> -->
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
							<li class="nav-item ">
								<a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item active">
								<a class="nav-link " href="{{ url('/pricing') }}">Pricing</a>
							</li>
						<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">Sign in</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">Sign up</a>
							</li>                             
						</ul>
					</div>
				</div>
			</nav>
		</header>
@stop

@section('sidebar')
    
@endsection

@section('content')
<section class="pricing">
            <div class="container">
                <div class="title-header">
                    <h1>Choose a plan that works for you</h1>
                </div>
                <div class="row mt-5 pt-5">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricecol p-2 pt-4">
                        <p class="pricetext">Starter</p>
                        <div class="price">
                                <h5 class="pricenumber">0.00<p>/mo</p></h5>
                            </div>
                            
                        <ul class="pricelist pt-3">
                            <li>
                                <span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></span>Active projects</li>
                            <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></span>  Three active projects</li>
                            <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></span>  Two collaborators per project</li>
                            <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></span>  One of each generatable document</li>
                        </ul>

                        <div class="price-button p-3">
                                <a href="#" class="btn btn-primary btn-block">Sign up for free</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="pricecol p-2 pt-4">
                            <p class="pricetext">Pro</p>
                            <div class="price">
                                    <h5 class="pricenumber">24.99<p>/mo</p></h5>
                                </div>
                                    
                            <ul class="pricelist pt-3">
                                    <p class="m-0" style="font-size: 12px">All Stater features and</p>
                                <li>
                                    <span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span>Active projects</li>
                                <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span>  Three active projects</li>
                                <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span>  Two collaborators per project</li>
                                <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg></span>  One of each generatable document</li>
                            </ul>
    
                            <div class="price-button p-3">
                                    <a href="#" class="btn btn-primary btn-block">Sign up for free</a>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="pricecol p-2 pt-4">
                                <p class="pricetext">Pro Plus</p>
                                <div class="price">
                                    <h5 class="pricenumber">79.99<p>/mo</p></h5>
                                </div>
                                
        
                                <ul class="pricelist pt-3">
                                <p class="m-0" style="font-size: 12px">All Stater and Pro features and</p>

                                    <li>
                                        <span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></span>Active projects</li>
                                    <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></span>  Three active projects</li>
                                    <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></span>  Two collaborators per project</li>
                                    <li><span><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 10.0857V11.0057C20.9988 13.1621 20.3005 15.2604 19.0093 16.9875C17.7182 18.7147 15.9033 19.9782 13.8354 20.5896C11.7674 21.201 9.55726 21.1276 7.53447 20.3803C5.51168 19.633 3.78465 18.2518 2.61096 16.4428C1.43727 14.6338 0.879791 12.4938 1.02168 10.342C1.16356 8.19029 1.99721 6.14205 3.39828 4.5028C4.79935 2.86354 6.69279 1.72111 8.79619 1.24587C10.8996 0.770634 13.1003 0.988061 15.07 1.86572" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 3.00574L11 13.0157L8 10.0157" stroke="#091429" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></span>  One of each generatable document</li>
                                </ul>
        
                                <div class="price-button p-3">
                                        <a href="#" class="btn btn-primary btn-block">Sign up for free</a>
                                </div>
                            </div>
                            </div>
            
                </div>
            </div>
        </section>
        <article>
                <div class="enter-div">
                    <h4 id="enter-line">Enterprise ready tools</h4>
                    <h6>with dedicated support and quick and consistent deolverance of new features, you can trust your<br>
                    process in our able hands</h6>
                    <br>
                    <button type="button" class="btn" >Contact Sales</button>
                </div>
        </article>
@stop



@section('footer')
    <footer class="bg-white pt-4">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-2">
						<img src="{{ asset('images/svg/logo-dark.svg') }}" alt="" class="img img-responsive mb-2" height="30" width="auto">
						<ul class="list-unstyled">
							<li><a class="text-dark" href="#">Pricing</a></li>
							<li><a class="text-dark" href="#">Sign in</a></li>
							<li><a class="text-dark" href="#">Sign up</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-2">
						<h5>Features</h5>
						<ul class="list-unstyled">
							<li><a class="text-dark" href="#">Dashboard</a></li>
							<li><a class="text-dark" href="#">Projects</a></li>
							<li><a class="text-dark" href="#">Invoices</a></li>
							<li><a class="text-dark" href="#">Create a Project</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<h5>Reach us</h5>
						<p class="text-dark small">
							52b, Charity Lane, off Magboso Highway, Ikate, London, Nigeria
						</p>
						<h5 class="">
							<a href="#" class="text-dark mr-2"><i class="fab fa-facebook-square"></i></a> 
							<a href="#" class="text-dark"><i class="fab fa-twitter-square"></i></a>
						</h3>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<h5>Stay up to date</h5>
						<p class="text-dark small">
							Get emails about our newest features and events you can visit. We promise not to spam.
						</p>
						<form class="form-inline">
							<div class="form-group mb-2 mr-2">
								<label for="staticEmail2" class="sr-only">Email</label>
								<input type="email" class="form-control" id="staticEmail2" value="" placeholder="Email Address" required>
							</div>
							<button type="submit" class="btn btn-secondary mb-2">Subscribe</button>
						</form>
					</div>
				</div>
			</div>
			<div class="bg-white text-left py-2 mt-0">
				<div class="container">
					<p class="float-right">
			    	<a href="#">Back to top</a>
				    </p>
				    <p>&copy; Lancer 2019.</p>
				</div>
			</div>
		</footer>
@stop
