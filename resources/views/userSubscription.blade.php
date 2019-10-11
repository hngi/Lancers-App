@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><a href='/dashboard' >Dashboard</a></div>
              
            <div class="card-header"><a href='/users/subscriptions' >Subscriptions</a></div>
                <div class="card-header"><a href='/users/view/subscriptions' >Current Plan</a></div>
                
                <div class="card-header"><h1>View My Current Subscription</h1></div>

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
                  @if($plans == null)
                <h1>No user plans to available, please Select a plan</h1>
                  @endif

                   @if(($plans != null) && ($dates != null))
                        <div>
                        
                        <p><strong>Plan Start Date: </strong>{{$dates[0]}}</p>
                      <p><strong>Plan End Date: </strong>{{$dates[1] }}</p>
                       
                     <p><strong>Plan Name: </strong>{{str_replace("_"," ",ucfirst($plans['name'])) }}</p>
                      <p><strong>Plan Description:</strong> {{str_replace("_"," ",ucfirst($plans['description'])) }}</p>  
                    <p><strong>Plan Price:</strong> ${{$plans['price']}}</p>  
                         
                        </div>
                       
                        @php
                        $FeaturesArray = $plans['features'];
                        @endphp
                           <h5>Features: </h5> 
                            @foreach ($FeaturesArray as $Featureskey => $Featuresvalue)
                                    @php
                                ($Featuresvalue == true) ? $Featuresvalue = "TRUE" : (($Featuresvalue == false) ? $Featuresvalue = "FALSE" : (($Featuresvalue == null) ? $Featuresvalue = "No" : "Null"));
                                @endphp
                                {{ str_replace("_"," ",ucfirst($Featureskey)) }} : {{ ucfirst($Featuresvalue)}}
                                </br>
                            @endforeach
                            
                   
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
