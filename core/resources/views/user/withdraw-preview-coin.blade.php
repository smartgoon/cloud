@extends('layouts.user-frontend.user-dashboard')
@section('style')

    <style>
        .input-text-box{
            border: 1px solid black;
        }
    </style>

@endsection
@section('content')
    @include('layouts.breadcam')
    <div class="content_padding">
        <div class="container user-dashboard-body">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page_title">{!! $page_title  !!} </h3>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->

                            <!-- panel head -->
                            <div class="panel-heading">
                                <div class="panel-title"><strong>{{ $page_title }}</strong></div>
                            </div>
                            <!-- panel body -->
                            <div class="panel-body">
                                <div class="text-center">
                                    <h3 class="bold uppercase">Current Balance : <strong>{{ $data->balance }} - {{ $data->miner->code }}</strong></h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-top: 5px;font-size: 14px;" class="col-sm-12 bold uppercase control-label">Request Amount : </label>

                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" value="{{ $withdraw->amount }}" readonly name="amount" id="amount" class="form-control bold" placeholder="Enter Deposit Amount" required>
                                                    <span class="input-group-addon red">&nbsp;<strong> {{ $data->miner->code }} </strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-top: 5px;font-size: 14px;" class="col-sm-12 bold uppercase control-label">Withdrawal Charge : </label>

                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" value="{{ $withdraw->charge }}" readonly name="charge" id="charge" class="form-control bold" placeholder="Enter Deposit Charge" required>
                                                    <span class="input-group-addon red">&nbsp;<strong> {{ $data->miner->code }} </strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-top: 5px;font-size: 14px;" class="col-sm-12 bold uppercase control-label">Total Amount : </label>

                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" value="{{ $withdraw->net_amount }}" readonly name="charge" id="charge" class="form-control bold" placeholder="Enter Deposit Amount" required>
                                                    <span class="input-group-addon red">&nbsp;<strong> {{ $data->miner->code }} </strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="margin-top: 5px;font-size: 14px;" class="col-sm-12 bold uppercase control-label">Available Balance : </label>

                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" value="{{ $data->balance - $withdraw->net_amount }}" readonly class="form-control bold" required>
                                                    <span class="input-group-addon red">&nbsp;<strong> {{ $data->miner->code }} </strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->

                        <!-- panel head -->
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-send"></i> <strong>Payment Send Details</strong></div>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="col-md-12">

                                {!! Form::open(['route'=>'withdraw-submit']) !!}
                                <input type="hidden" name="withdraw_id" value="{{ $withdraw->id }}">
                                <div class="row">
                                    <div class="form-group">
                                        <label style="margin-top: 5px;font-size: 14px;" class="col-sm-2 bold uppercase text-right  control-label">{{ $data->miner->code }} Wallet Address : </label>

                                        <div class="col-sm-8">
                                            <p class="text-success"><strong>{{ $data->wallet }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label style="margin-top: 5px;font-size: 14px;" class="col-sm-2 bold uppercase text-right control-label">Message  : </label>

                                        <div class="col-sm-8">

                                                        <textarea name="message" id="" rows="3"
                                                                  class="form-control bold input-lg" placeholder="Message ( If Any )"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">

                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-primary btn-icon bold uppercase icon-left btn-block">Submit Withdraw</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!---ROW-->
        </div>
    </div>



@endsection
@section('script')

@endsection

