@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">


            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body" style="overflow: hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center bold">
                                <h3>Transaction ID : #{{ $log->transaction_id }}</h3>
                                <h3>
                                    @if($log->type == 'general')
                                        Method : {{ $log->method->name }}
                                        @php
                                            $currency = $basic->currency;
                                            $details = 'Sending Details : ' . $log->send_details;
                                        @endphp
                                    @elseif($log->type == 'coin')
                                        @php
                                            $wallet = \App\UserData::findOrFail($log->method_id);
                                            $currency = $wallet->miner->code;
                                            $details = 'Wallet Address : ' . $wallet->wallet;
                                        @endphp
                                        Coin Type : {{ $wallet->miner->code }}
                                    @endif
                                </h3>
                                <h3>Withdraw Amount : {{ $log->amount}} - {{ $currency }}</h3>
                                <h3>{{ $details }}</h3>
                                <br>
                                <h4>Status :
                                    @if($log->status == 0 )
                                        <span class="label label-warning bold uppercase"><i class="fa fa-spinner"></i> Pending</span>
                                    @elseif($log->status == 1)
                                        <span class="label label-success bold uppercase"><i class="fa fa-check"></i> Completed</span>
                                    @elseif($log->status == 2)
                                        <span class="label label-danger bold uppercase"><i class="fa fa-times"></i> Refunded</span>
                                    @endif
                                </h4>
                                @if($log->status ==0)
                                <hr>
                                <div class="col-md-3 col-md-offset-3">
                                    <button type="button" class="btn btn-success bold uppercase btn-block delete_button"
                                            data-toggle="modal" data-target="#DelModal"
                                            data-id="{{ $log->id }}">
                                        <i class='fa fa-check'></i> Approve Withdraw
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger bold uppercase btn-block refund_button"
                                            data-toggle="modal" data-target="#cancelModal"
                                            data-id="{{ $log->id }}">
                                        <i class='fa fa-times'></i> Refund Payment
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Message : </h3><br>
                            {!! $log->message !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- ROW-->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i><strong>Confirmation..!</strong> </h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure to Confirm This Withdraw..?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('withdraw-confirm') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                        <button type="submit" class="btn btn-success"> Yes I'm Sure..!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i><strong>Confirmation..!</strong> </h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure to Refund This Withdraw..?</strong>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{ route('withdraw-refund') }}" class="form-inline">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> Yes I'm Sure..!</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
        $(document).ready(function () {

            $(document).on("click", '.refund_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);

            });

        });
    </script>

@endsection
