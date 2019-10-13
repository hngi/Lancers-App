@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment for {{$data['name']}}</div>
                <div class="card-body">                   
                    @if($data['amount'] == 0)
                        {{ "No payment needed"}}
                    @else
                        <div class="row form-group">                            
                            @if($data['type'] == 'sub')
                                <label for="password" class="col-md-4 col-form-label text-md-right">Enter number of months</label>
                                <div class="col-md-6">
                                    <input id="months_input" min="1" type="number" class="form-control" value="1" autofocus>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <br>
                                    <button id="makepayment" class="btn btn-primary btn-block">Pay ${{$data['amount']}}</button>
                                </div>
                            @else
                                <div class="col-md-6 offset-md-3">
                                    <br>
                                    <button id="pay_default" class="btn btn-primary btn-block">Pay ${{$data['amount']}}</button>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

            <script src="https://js.paystack.co/v1/inline.js"></script>
            <script>
                const paymentType = "{{$data['type']}}";
                window.addEventListener('DOMContentLoaded', function () {              
                    const monthsInput = document.getElementById("months_input");
                    const makePaymentBtn = document.getElementById("makepayment");
                    const payDefault = document.getElementById("pay_default");
                    const dbAmount = Number({{$data['amount']}});

                    if(paymentType == "sub"){    
                        const balance = new Number({{$data['balance']}})                    
                        monthsInput.addEventListener("input", function(e){
                            makePaymentBtn.innerText = "Pay $" + ((e.target.value * dbAmount) - balance).toFixed(2);
                        });

                        makePaymentBtn.addEventListener('click', function(){
                            let months = monthsInput.value;
                            let amount = (months * dbAmount) - balance;

                            if(months < 1){
                                alert("Number of months must be at least 1");
                            }else{
                                payWithPaystack(amount, months);
                            }
                        });
                    }else{                        
                        payDefault.addEventListener('click', function(){
                            payWithPaystack(dbAmount - balance);
                        });
                    }



                });


                const API_publicKey = "{{$data['key']}}";
                const redirect = "{{$data['redirect']}}";

                function payWithPaystack(amount, months = 1){
                    var handler = PaystackPop.setup({
                      key: API_publicKey,
                      email: "{{auth()->user()->email}}",
                      amount: amount*100,
                      currency: "NGN",
                      ref: "{{$data['ref']}}",
                      metadata: {
                         custom_fields: [
                            {
                                display_name: "type",
                                variable_name: "type",
                                value: "{{$data['type']}}"
                            },
                            {
                                display_name: "id",
                                variable_name: "id",
                                value: "{{$data['id']}}"
                            },
                            {
                                display_name: "months",
                                variable_name: "months",
                                value: months
                            }
                         ]
                      },
                      callback: function(response){
                          window.location.href = redirect +  response.reference;
                      },
                      onClose: function(){
                          alert('window closed');
                      }
                    });
                    handler.openIframe();
                }
            </script>
            </div>
        </div>
    </div>
</div>
@endsection
