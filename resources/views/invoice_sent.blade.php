@extends('layouts.master')

@section('styles')
<style>
    body {
        background-color: #F2F3F3;
        margin: 0;
        padding: 0;
        border: 0;
        font-family: 'Ubuntu', sans-serif;
    }

    .main {
        background-color: #FFFFFF;
        text-align: center;
        height: 206px;
    }

    .fa-check-circle {
        color: #00FFA3;
        font-size: 58px;
        margin-top: 25px;
    }

    .clear {
        color: #C4C4C4;
        width: 1em;
        height: auto;
        position: absolute;
        top: 56px;
        right: 56px;
    }

    .side {
        /*height: auto;
        text-align: center;
        position: absolute;
        top: 25rem;*/
        height: 75vh;
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: center;
    }

    .invBtn {
        background-color: #0ABAB5;
        color: #FFFFFF;
        border: 0;
        width: 332px;
        height: 98px;
        font-size: 28px;
    }

    h3 {
        font-size: 28px;
        color: #323A43;
    }

    p {
        font-size: 18px;
        color: #262626;
    }

    @media (max-width: 767.98px) {
        .invBtn {
            width: 10em;
            font-size: 20px;
        }

        .clear {
            top: 10px;
            right: 10px;
        }
    }
    </style>
@endsection

@section('content')
    <div class="container-fluid main">
        <i class="fa fa-check-circle"></i>
        <a href="#"><img class="clear" src="https://res.cloudinary.com/soot3/image/upload/v1570665870/clear_24px_sz8k0p.png" alt="clear"></i></a>
        <h3><strong>Invoice Sent</strong></h3>
        <h5>You would receive a notification once payment has been made</p>

    </div>

    <div class="side">  
        <button class="invBtn">VIEW INVOICES</button>
    </div>
@endsection
