
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
        /* ---------------------------------
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

      
    </style>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style>

    *{
        box-sizing: border-box;
    }
    table {
        border-spacing: 5px;
    }

  td,
    th,tr {
        width: 36vw;
        margin: 0 auto;
        padding: 0 0 10px;
        text-align: left;
    }

  
    td:first-child,
    th:first-child {
        padding-left: 10px;
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
        color: black;
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
  /*  td,
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
}*/
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