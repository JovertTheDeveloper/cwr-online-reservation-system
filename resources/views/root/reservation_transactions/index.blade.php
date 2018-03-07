@extends('root.layouts.main')

@section('sidebar')
    @component('root.components.sidebar')
        <!-- Print -->
        <li class="m-menu__item" aria-haspopup="true">
            <a href="javascript:void(0);" class="m-menu__link">
                <i class="m-menu__link-icon la la-print"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-text">Print</span>
                </span>
            </a>
        </li>
        <!--/. Print -->
    @endcomponent
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Transactions</h3>
                </div>
            </div>
        </div>

        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <!-- Type -->
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>Type:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="type">
                                            <option value="">All</option>
                                            <option value="payment">Payment</option>
                                            <option value="refund">Refund</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!--/. Type -->

                            <!-- Mode -->
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>Mode:</label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="mode">
                                            <option value="">All</option>
                                            <option value="cash">Cash</option>
                                            <option value="paypal_express">Paypal Express</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>
                            <!--/. Mode -->

                            <!-- Search -->
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                            <!--/. Search -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <table id="table" class="m-datatable" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Mode</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($reservation_transactions as $index => $reservation_transaction)
                        @include('root.reservation_transactions.reservation_transaction')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@section('scripts')
    <script>
        var reservation_transactions = function() {
            //== Private functions

            // days initializer
            var reservation_transactionsInit = function() {

                var datatable = $('table[id=table]').mDatatable({
                    data: {
                        saveState: { cookie: false },
                    },
                    layout: {
                        theme: 'default',
                        class: '',
                        scroll: false,
                        footer: false
                    },
                    search: {
                        input: $('#generalSearch'),
                    },
                    columns: [
                        {
                            field: '#',
                            width: 30,
                            type: 'number'
                        },
                        {
                            field: 'Type',
                            width: 100,
                            template: function(row) {
                                var status = {
                                    1: {'title': 'Payment', 'class': ' m-badge--success'},
                                    2: {'title': 'Refund', 'class': ' m-badge--danger'}
                                };

                                return  '<span class="m-badge ' + status[row.Type].class + ' m-badge--wide">' +
                                            '<span class="text-white">' + status[row.Type].title + '</span>' + '</span>';
                            }
                        },
                        {
                            field: 'Mode',
                            width: 100
                        },
                        {
                            field: 'Amount',
                            width: 75
                        },
                    ]
                });

                $('select[id=type]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Type');
                });

                $('select[id=mode]').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Mode');
                });
            };

            // selects
            var selectsInit = function () {
                $('.m-bootstrap-select').selectpicker({});
            }
            //. selects

            return {
                init: function() {
                    reservation_transactionsInit();
                    selectsInit();
                },
            };
        }();

        $(document).ready(function() {
            reservation_transactions.init();
        });
    </script>
@endsection