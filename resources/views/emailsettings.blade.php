@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header"><a href='/dashboard' >Dashboard</a></div>
                    <div class="card-header"><a href='/users/subscriptions' >Subscriptions</a></div>
                    <div class="card-header"><a href='/users/view/subscriptions' >Current Plan</a></div>
                    <div class="card-header"><a href='/dashboard/profile/view' >View Profile</a></div>
                    <div class="card-header"><a href='/dashboard/profile' >Edit Profile</a></div>
                    <div class="card-header"><a href='/users/settings/emails' >Email Settings</a></div>
            <div class="card">
                @if(($status == "success") && ($data != null ))

                        @php
                        $invoiceMessage = $data['auto_invoice_message'];
                        $proposalMessage = $data['auto_proposal_message'];
                        $agreementMessage = $data['auto_agreement_message'];

                        @endphp
                @endif

                @if(($status == "failure") && ($data == null ))
                    @php
                    $invoiceMessage = '';
                    $proposalMessage = '';
                    $agreementMessage = '';

                    @endphp
                 @endif

                <div class="card-header">{{ __('Email Settings') }}</div>
                    @if(session('editErrors'))
                        <div class="alert alert-fail" role="alert">
                            <h5><strong>Error:</strong></h5>
                            @foreach(session('editErrors') as $error)
                                        <i style="color: red;">{{ $error }} </i></br>
                            @endforeach
                            </div>
                    @endif

                    @if(session('editSuccess') != null)
                    <div class="alert alert-fail" role="alert">
                        <h5><strong>Success:</strong></h5>

                        <i style="color: green;">{{ session('editSuccess') }} </i></br>

                        </div>
                    @endif

                    @if(session('editFailure') != null)
                    <div class="alert alert-fail" role="alert">
                        <h5><strong>Error:</strong></h5>

                        <i style="color: red;">{{ session('editFailure') }} </i></br>

                        </div>
                    @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('SET-EMAIL') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="invoice" class="col-md-4 col-form-label text-md-right">{{ __('Invoice Message') }}</label>

                            <div class="col-md-6">
                                <input id="invoice" type="text" class="form-control" value="{{ $invoiceMessage }}" name="invoice">
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="proposal" class="col-md-4 col-form-label text-md-right">{{ __('Proposal Message') }}</label>

                            <div class="col-md-6">
                                <input id="proposal" type="text" class="form-control"  value="{{ $proposalMessage }}" name="proposal">
                           </div>
                        </div>

                        <div class="form-group row">
                            <label for="agreement" class="col-md-4 col-form-label text-md-right">{{ __('Agreement Message') }}</label>

                            <div class="col-md-6">
                                <input id="agreement" type="text" class="form-control" value="{{ $agreementMessage }}" name="agreement">
                           </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
