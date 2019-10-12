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
            {{-- <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> --}}
            <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
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
                                payWithRave(amount, months);
                            }
                        });
                    }else{                        
                        payDefault.addEventListener('click', function(){
                            payWithRave(dbAmount - balance);
                        });
                    }



                });


                const API_publicKey = "{{$data['key']}}";
                const redirect = "{{$data['redirect']}}";

                function payWithRave(amount, months = 1) {
                    var x = getpaidSetup({
                        PBFPubKey: API_publicKey,
                        customer_email: "{{auth()->user()->email}}",
                        amount: amount,
                        customer_phone: "234099940409",
                        currency: "NGN",
                        txref: "{{$data['ref']}}",
                        meta: [
                            {
                                metaname: "type",
                                metavalue: "{{$data['type']}}"
                            },
                            {
                                metaname: "id",
                                metavalue: "{{$data['id']}}"
                            },
                            {
                                metaname: "months",
                                metavalue: months
                            }
                        ],
                        onclose: function() {},
                        callback: function(response) {
                            var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                            console.log("This is the response returned after a charge", response);
                            if (
                                response.tx.chargeResponseCode == "00" ||
                                response.tx.chargeResponseCode == "0"
                            ) {
                                window.location.href = redirect + txref;
                            } else {
                                alert("Your payment was not successful");
                                // redirect to a failure page.
                            }

                            x.close(); // use this to close the modal immediately after payment.
                        }
                    });
                }
            </script>
            </div>
        </div>
    </div>
</div>
@endsection
