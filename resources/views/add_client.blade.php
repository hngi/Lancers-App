
@extends('layouts.master')  
@section('sidebar')


<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Lan<span class="colorC">c</span>ers </div>
      <div class="list-group list-group-flush">
        <a href="/dashboard" class="list-group-item list-group-item-action bg-dark"><img src="https://res.cloudinary.com/samtech/image/upload/v1570727367/home.svg" alt=""> Dashboard</a>
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
@section('nav')
    <nav>
        <div class="header-container">
            <div class="back-close">
                <button id="close"><img src="https://res.cloudinary.com/mide358/image/upload/v1570621469/clear_24px_rasbwc.png" alt="back"></button>
                <button id="back"><img src="https://res.cloudinary.com/mide358/image/upload/c_scale,h_27,w_13/v1570621434/Vector_ag4hnv.png" alt="back"></button>
            </div>

            <h4>Client</h4>
            <button id="create">Create Invoice</button>
        </div>
    </nav>
@endsection

@section('content')


        <div class="container">

       <div class="form">
           <h1>Client Information</h1>
           <form autocomplete="on" action="" method="post" onsubmit="return checkForm()">
            <div>
                    <p class="error" id="errorMsg">All Fields Required</p>
            <h3> Business Information</h3>

               <label for="company-name">Company name</label>
               <input type="text" id="companyname" name="company" placeholder="e.g Sunshine Studio">
               <br><br>
               <h4>Business Address</h4>
                <label for="Street">Street & Number</label>
                <input type="text" id="streetname" name="streetname" placeholder="Street">
                <input type="number" id="strnumber" name="strnumber" placeholder="number">
                <br>

                <label for="city">City & ZIP Code</label>
                <input type="text" id="city" name="city" placeholder="City">
                <input type="text" id="postalcode" name="postalcode" placeholder="Postal code">
                <br>
                <label for="Country-state">Country & State</label>
                <!--country drop down list-->
                <select id="country" name="country">
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote DIvoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="India">India</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                 </select>
                 <input type="text" id="state" name="state" placeholder="State">
            </div>
              <div>
                  <h3>Contact Information</h3>
                  <label for="contact-name">Contact name</label>
                <input type="text" id="contactname" name="contactname" placeholder="e.g Ben Davies">
                <br>
                <label for="contact-email">Contact email</label>
                <input type="email" id="contactemail" name="contactemail" placeholder="e.g email@domain.com">
                <br>
                <p class="error" id="errorEmail"></p>
                <br>
                <h4>Add other contacts</h4>
              </div>


           </form>

       </div>
        </div>
@endsection

@section("footer")
        <footer> <button id="bottom-create" type="submit">Create Invoice</button></footer>
       
@endsection
@section("script")

  <script>

      var companyname = document.getElementById("companyname");
      var streetname = document.getElementById("streetname");
      var strnumber = document.getElementById("strnumber");
      var city = document.getElementById("city");
      var postalcode = document.getElementById("postalcode");
      var country = document.getElementById("country");
      var state = document.getElementById("state");
      var contactme = document.getElementById("contactname");
      var contactemail = document.getElementById("contactemail");
      
      // check if any input is empty.
      function checkForm() {
          if((companyname.value == 0 && streetname.value == 0 &&
              strnumber.value == 0 && city.value == 0 &&
              postalcode.value == 0 && state.value == 0
              && contactme.value == 0 && contactemail.value == 0)){

              document.getElementById("errorMsg").style.display ="block";
          }
          else {
              document.getElementById("errorMsg").style.display ="none";
          }
      }
      
      function removeNameErrorWhenCorrecting() {

          document.getElementById("errorMsg").style.display = "none";
      }
      if (companyname.addEventListener) {
          companyname.addEventListener('blur', checkForm, false);
          companyname.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (streetname.addEventListener) {
          streetname.addEventListener('blur', checkForm, false);
          streetname.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (strnumber.addEventListener) {
          strnumber.addEventListener('blur', checkForm, false);
          strnumber.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (city.addEventListener) {
          city.addEventListener('blur', checkForm, false);
          city.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (postalcode.addEventListener) {
          postalcode.addEventListener('blur', checkForm, false);
          postalcode.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (country.addEventListener) {
          country.addEventListener('blur', checkForm, false);
          country.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (state.addEventListener) {
          state.addEventListener('blur', checkForm, false);
          state.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (contactme.addEventListener) {
          contactme.addEventListener('blur', checkForm, false);
          contactme.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }
      else if (contactemail.addEventListener) {
          contactemail.addEventListener('blur', checkForm, false);
          contactemail.addEventListener('focus', removeNameErrorWhenCorrecting, false);
      }


      // If email is the right format
      function checkEmailField() {
          // format for email validation
          var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if (contactemail.value.indexOf("@", 0) < 0) {
              document.getElementById("errorEmail").style.display = "block";
              document.getElementById("errorEmail").textContent = "Your email address does not have an '@' symbol!";


          }
          else if (contactemail.value.indexOf(".", 0) < 0) {
              document.getElementById("errorEmail").style.display = "block";
              document.getElementById("errorEmail").textContent = "A '.' symbol is missing in your email address, please check!";

          }
          else if (mailFormat.test(contactemail.value) == false) {
              document.getElementById("errorEmail").style.display = "block";
              document.getElementById("errorEmail").textContent = "Wrong email format, please try again!";

          }
          else {
              document.getElementById("errorEmail").style.display = "none";
              country.removeAttribute('disabled');
              contactemail.removeAttribute('disabled');
          }
      }
      function removeEmailErrorWhenCorrecting() {
          document.getElementById("errorEmail").style.display = "none";
      }
      if (contactemail.addEventListener) {
          contactemail.addEventListener('blur', checkEmailField, false);
          contactemail.addEventListener('focus', removeEmailErrorWhenCorrecting, false);
      }

  </script>
@endsection
