@extends('layouts.master')  

@section('styles')
<style>

    *{
        box-sizing: border-box;
    }
    table {
        border-spacing: 5px;
    }

    td,
    th {
        width: 46vw;
        margin: 0 auto;
        padding: 0 0 10px;
        text-align: left;
    }
    td:first-child,
    th:first-child {
        padding-left: 20px;
    }
    td:last-child,
    th:last-child {
        margin-right: .5rem;
        text-align: right;
    }
thead, .table-date {
        max-width: 100%;
        font-family: Ubuntu;
        font-weight: bold;
        font-size: 14px;
        line-height: 28px;
        color: #A6A6A6;
}
tbody, .bold {

        font-family: Ubuntu;
        font-size: .97rem;
        font-weight: 500;
        line-height: 1.5;
        color: #212529;
     }
     .table-responsive {
    display: table;
    width: 100%;
    overflow-x: unset;
    padding-right: .5rem;
    -webkit-overflow-scrolling: touch;
}
.note h5 {
    font-family: Ubuntu;
    font-weight: bold;
    font-size: 14px;
    color: #A6A6A6;
}
     .tableAmount {
        font-weight: 900;
        font-size: 1.05rem;
     }
     .invoice-main {
      width: 100%;
     }
    .invoice-container {
        position: relative;
        top: 3rem;
        width: 52.5vw;
        margin-left: 4rem;
        padding-right: 2rem!important;
        background: #FFFFFF;
        border: 1px solid #C4C4C4;
        box-sizing: border-box;
        margin-bottom: 2rem;
    }
    .invoice-body {
        position: relative;
        width: 55.5vw;
    }
.invoice-table {
  padding-bottom: 2rem;
  padding-left: 1rem;
}
.removeBorder  {
    padding: .75rem;
    vertical-align: top;
    border-top: none !important;
}
.thickLine {
    padding: .75rem;
    vertical-align: top;
    border-top: 3px solid #000 !important;
}
    .logo-img {
        width: 7.5rem;
        float: right;
    }
    h1 {
        color: rgb#546067;
        font-size: 4rem;
        font-family: 'Ubuntu', sans-serif;
        font-style: normal;
        font-weight: bold;
        color: #546067;
    }
    p {
        margin-bottom: .5rem;
      }

body {
    overflow-x: hidden;
}
#sidebar-wrapper {
  height: 90vh;
  width: 40vh;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)!important;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}
img {
      width: .85rem;
      margin-right: .5rem;
      margin-left: 1.8rem;
}
.imgSvg {
    padding-left: unset;
      margin-right: .2rem;
      margin-left: 1.8rem;
  }
.bg-dark {
  background: #091429 !important;
  font-size: .75rem;
  color: #fff;
}
.colorC {
  color: #00F9FF;
}
.colorC2 {
  color: #0ABAB5;
}
.navbar {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: .5rem 0;
}
a.bg-dark:focus, a.bg-dark:hover, button.bg-dark:focus, button.bg-dark:hover {
    background-color: #c1c1c1!important;
}
.list-group-item-action:focus, .list-group-item-action:hover {
    color: #091429;
}
.list-group-item {
    padding: 1.275rem 1.25rem;
    margin-bottom: -1px;
    background-color: #c1c1c1;
    border: unset;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
    letter-spacing: .9px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 3.3rem;
  font-size: 1.5rem;
  font-family: 'Pacifico', cursive;
}
.dropdown-menu {
    position: relative;
    width: 100%;
    min-width: unset;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background:#212531;
    background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    color: #fff;
    box-shadow: none;
}
.dropdown-menu.show {
    top: 0;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 300;
    color: #fff;
}
svg {
  padding-left: .5rem;
  padding-bottom: .2rem;
}
#page-content-wrapper {
  min-width: 100%;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}
/*navBar*/
.bg-light {
    background-color: unset!important;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
}
.navbar-light .navbar-nav .nav-link {
    margin-left: 1.5vw;
    font-family: 'Ubuntu', sans-serif;
    font-weight: 500;
    color: #000;
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: #0ABAB5;
}
.btn-outline-dark {
        font-family: Ubuntu;
        font-weight: bold;
        font-size: 14px;
}
.btn.bg {
    color: #fff;
    background-color: #0ABAB5;
}
@media (max-width: 992px) {    
#sidebar-wrapper {
  height: 80vw;
}
    td,
    th {
        padding: 0 0 7px !important;
    }
    td:last-child,
    th:last-child {
        margin-right: .3rem;
    }
thead, .table-date {
        font-size: 12px;
        line-height: 14px;
}
.col-6.mb-4 {
    padding-left: 0;
}
.table td, .table th {
    padding:0;
}
tbody, .bold {
        font-size: .82rem;
        line-height: 1.5;
     }
     .tableAmount {
        font-weight: 900;
        font-size: .9rem;
     }
     .invoice-main {
      width: 100%;
     }
    .invoice-container {
        position: relative;
        top: 3rem;
        width: 54vw;
        margin-left: 4.5rem;
        margin-bottom: 2rem;
    }
.invoice-table {
  padding-left: 0;
}
.thickLine {
    border-top: 2px solid #000 !important;
}
    .logo-img {
        width: 4.5rem;
        float: right;
    }

.btn-outline-dark {

        font-family: Ubuntu;
        font-weight: bold;
        font-size: 12px;
}
    h1 {
        font-size: 20px;
    }
    p {
        margin-bottom: .2rem;
        font-size: .7rem;
      }
.footer-text{
    font-family: Ubuntu;
    font-style: normal;
    font-weight: normal;
    font-size: 1rem;
    }
    @media (max-width: 991px) {
        .nav-item.ml-3 {
            margin-left: 0!important;
        }
    }
}
@media (max-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
    height: 76vw;
    width: 20vh;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

img {
      width: .65rem;
      margin-right: .5rem;
      margin-left: .2rem;
}
.imgSvg {
      margin-right: .2rem;
      margin-left: .2rem;
  }
  .list-group-item {
    padding: 1.275rem 1.25rem;
    margin-bottom: -1px;
    font-size: .7rem;
    letter-spacing: .4px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 2.3rem;
  font-size: 1.15rem;
}
.btn-outline-dark {
        font-size: 10px;
    padding: .275rem .5rem;
}
.btn-outline-dark.ml-4 {
    margin-left: .5rem!important;
}
h1 {
        font-size: 16px;
    }
    p {
        margin-bottom: .2rem;
        font-size: .5rem;
      }
      .logo-img {
    width: 4rem;
}
thead, .table-date {
        font-size: 9px;
        line-height: 12px;
}
tbody, .bold {
        font-size: .72rem;
        line-height: 1;
     }
      td,
    th {
        width: 21vw;
    }
     .tableAmount {
        font-weight: 600;
        font-size: .75rem;
     }
     .navbar-light .navbar-nav .nav-link {
        font-size: .7rem;
}
.dropdown-item {
    font-size: .75rem;
    }
}
@media (max-width: 576px) {
    .invoice-body.ml-4 {
        display: none;
    }
    #sidebar-wrapper {
    width: 15vh;
    height: 92vw;
  }
img {
      width: .65rem;
      margin-right: .1rem;
      margin-left: .8rem;
}
.imgSvg {
      margin-right: .1rem;
      margin-left: .8rem;
  }
  .list-group-item {
    padding: 1.275rem 1rem;
    font-size: .55rem;
    letter-spacing: .2px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 2.1rem;
  font-size: .9rem;
}
.invoice-container {
    width: 68vw;
    margin-left: .9rem;
    margin-bottom: 2rem;
}
h1 {
        font-size: 14px;
    }
      .logo-img {
    width: 4rem;
}
thead, .table-date {
        font-size: 8px;
        line-height: 12px;
}
tbody, .bold {
        font-size: .62rem;
        line-height: 1;
     }
      td,
    th {
        width: 28vw;
    }
     .tableAmount {
        font-weight: 600;
        font-size: .75rem;
     }
     .navbar-light .navbar-nav .nav-link {
        font-size: .55rem;
}
.dropdown-item {
    font-size: .55rem;
    }
}
@media (max-width: 450px) {
    #sidebar-wrapper {
        display: none;
    }    
      td,
    th {
        width: 38vw;
    }
.invoice-container {
    width: 92vw;
    margin-left: .9rem;
    margin-bottom: 2rem;
}
}
</style>
@endsection

@section('content')
<section class="invoice-main ">
    <div class="container invoice-container shadow">
        <section id="showcase ">
            <div class="row container pt-4 ">
                <div class="col-6 mb-4">
                    <h1> Invoice </h1>
                    <address contenteditable="">
                        <p> <b>Project:</b> branding and marketing</p>
                        <p> <b>Lancer:</b> Endurance dan-jumbo</p>
                        <p> <b>Email:</b> Edanjumbo@gmail.com</p>
                        <p> <b>Address:</b> Accra, Ghana</p>
                    </address>
                </div>

                <div class="col-6">
                    <img src="https://res.cloudinary.com/samtech/image/upload/v1570725037/My_Logo_-_Black.png" class="img-fluid logo-img">
                </div>
            </div>
            <table class="table-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th> Bill to</th>
                        <th> Issue Date </th>
                        <th> Hourly Rate</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><span contenteditable="">John Doe</span> </td>
                    <td><span contenteditable=""> 18th September 2019</span></td>
                    <td> N/A</td>      
                </tr>
                <tr>
                  <td><span contenteditable="">Johndoe@gmail.com</span></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span contenteditable="">Accra, Ghana</span> </td>
                    <th class="table-date"> Due Date</th>
                    <th class="table-date"> Amount Due</th>
                </tr>
                <tr>
                  <td></td>
                  <td><span contenteditable="">28th September 2019</span> </td>
                  <td><span contenteditable="" class="tableAmount">NGN 38,500</span> </td>
                </tr>
              </tbody>
            </table>
            
            <section class="invoice-description mt-4    ">

                    <table class="table table-responsive container " style="width: 100%">
                        <thead class="thead" style="background-color: #009FFF; color: white;">
                            <tr>
                                <th scope="col" class="">Description</th>
                                <th> </th>
                                <th></th>
                                <th></th>
                                <th scope="col">Quantity </th>

                                <th></th>

                                <th scope="col">Rate </th>


                                <th></th>
                                <th scope="col">Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4">Sed ut perspiciatis unde omnis iste</td>
                                <td>1</td>
                                <td></td>
                                <td>NGN3500</td>
                                <td></td>
                                <td>NGN3500</td>
                            </tr>
                            <tr>
                                <td colspan="4">Sed ut perspiciatis unde omnis iste</td>
                                <td>10</td>
                                <td></td>
                                <td>NGN1700</td>
                                <td></td>
                                <td>NGN17000</td>
                            </tr>
                            <tr>
                                <td colspan="4">Sed ut perspiciatis unde omnis iste</td>

                                <td>15</td>
                                <td></td>
                                <td>NGN1200</td>
                                <td></td>
                                <td>NGN18000</td>
                            </tr>
                        <tr>
                        <td colspan="4"></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td>NGN38500</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                            
                        <td class="removeBorder" colspan="4"></td>
                            <td class="removeBorder"></td>
                            <td class="removeBorder table-date" colspan="2" style="text-align: right;">Discount</td>
                            <td class="removeBorder"></td>
                            <td class="removeBorder bold">N/A</td>
                            </tr>
                            <tr>
                        <td class="removeBorder" colspan="4"></td>
                            <td class="removeBorder"></td>
                            <td class="thickLine bold" colspan="2" style="text-align: right;">Amount Due</td>
                            <td class="thickLine"></td>
                            <td class="thickLine bold">NGN38500</td>
                            </tr>
                        </tfoot>
                    </table>
            </section>

            <section class="invoice-table" style="position: relative; top: 0rem">
                <section class="note">
                    <h5> Note</h5>
                    <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolor laudantium, totam
                        rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                </section>
            </section>
    </div>
</section>
@endsection