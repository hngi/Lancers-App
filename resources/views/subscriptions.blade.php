@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><a href='/dashboard' >Dashboard</a></div>
              
            <div class="card-header"><a href='/users/subscriptions' >Subscriptions</a></div>
                <div class="card-header"><a href='/users/view/subscriptions' >Current Plan</a></div>
                
                <div class="card-header"><h1>Select Subscription</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                </div>

                
                @if(session('editStatus') && session('plan'))
                     <div class="alert alert-success" role="alert">
                          {{ session('editStatus') }} {{ session('plan') }} plan
                        </div>
                @endif
                 @if(session('editErrors'))
                     <div class="alert alert-fail" role="alert">
                          {{ session('editErrors') }}
                        </div>
                @endif
                <div class="card-body">
                  
                   @if($plans != null)
                     <div>
                          @foreach ($plans as $mainPlans)
                                   @foreach ($mainPlans as $key => $value)
                                              @if($key == 'name')
                                                @php 
                                                $url = url("/payment/$value");

                                                @endphp
                                               
                                            @endif
                                          @if(($key != 'id') && ($key != 'created_at') && ($key != 'updated_at'))
                                               @if(($key != 'features') && ($key != 'price'))
                                                <h4> Plan {{  ucfirst($key) }} :</h4> {{ str_replace("_"," ",ucfirst($value))}} 
                                               @endif
                                                    @if($key == 'features')
                                                        @php
                                                        $FeaturesArray = $value;
                                                        @endphp
                                                            <h5>{{ ucfirst($key) }}</h5>
                                                            @foreach ($FeaturesArray as $Featureskey => $Featuresvalue)
                                                                    @php
                                                                ($Featuresvalue == true) ? $Featuresvalue = "TRUE" : (($Featuresvalue == false) ? $Featuresvalue = "FALSE" : (($Featuresvalue == null) ? $Featuresvalue = "No" : "Null"));
                                                                @endphp
                                                                {{ str_replace("_"," ",ucfirst($Featureskey)) }} : {{ ucfirst($Featuresvalue)}}
                                                                </br>
                                                            @endforeach
                                                            
                                                    @endif 
                                            
                                            </br>
                                               @if($key == 'price')
                                                <h4> Plan {{  ucfirst($key) }} :</h4> ${{ str_replace("_"," ",ucfirst($value))}} 
                                              
                                                <a href={{$url}}>Select Plan<a/>
                                               
                                                @endif
                                           @endif

                                              

                                    @endforeach
                                    </br>
                                    </br>
                                    
                          @endforeach
                         
                        </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
