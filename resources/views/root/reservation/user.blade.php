@extends('root.layouts.main')

@section('sidebar')
    @component('root.components.sidebar')@endcomponent
@endsection

@section('content')
    @if (! Request::input('existing'))
        @component('root.components.alert')
            Choose previous customer? <a href="{{ route('root.reservation.user').'?existing=true' }}" class="m-link">Click here.</a>
        @endcomponent
    @else
        @component('root.components.alert')
            Create a new customer? <a href="{{ route('root.reservation.user') }}" class="m-link">Click here.</a>
        @endcomponent
    @endif

    <div class="row">
        <div class="col-lg">
            <!-- New user -->
            @if (! Request::input('existing'))
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>

                                <h3 class="m-portlet__head-text">Customer info</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('root.reservation.user') }}" id="form-reservation-store"
                        class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed m-form--state">
                        {{ csrf_field() }}

                        <div class="m-portlet__body">
                            <!-- Firstname -->
                            <div class="form-group m-form__group row {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                                <label for="first_name" class="col-lg-2 col-form-label">
                                    Firstname <span class="m--font-danger">*</span>
                                </label>

                                <div class="col-lg-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control m-input
                                        {{ $errors->has('first_name') ? 'form-control-danger' :'' }}"
                                            placeholder="Please enter a firstname" value="{{ old('first_name') }}">

                                        @if ($errors->has('first_name'))
                                            <div id="first_name-error" class="form-control-feedback">
                                                <span class="m--font-danger">{{ $errors->first('first_name') }}</span>
                                            </div>
                                        @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Firstname -->

                            <!-- Middlename -->
                            <div class="form-group m-form__group row {{ $errors->has('middle_name') ? 'has-danger' : '' }}">
                                <label for="middle_name" class="col-lg-2 col-form-label">
                                    Middlename
                                </label>

                                <div class="col-lg-6">
                                    <input type="text" name="middle_name" id="middle_name" class="form-control m-input
                                        {{ $errors->has('middle_name') ? 'form-control-danger' :'' }}"
                                            placeholder="Please enter a middlename" value="{{ old('middle_name') }}">

                                    @if ($errors->has('middle_name'))
                                        <div id="middle_name-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('middle_name') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Middlename -->

                            <!-- Lastname -->
                            <div class="form-group m-form__group row {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                                <label for="last_name" class="col-lg-2 col-form-label">
                                    Lastname <span class="m--font-danger">*</span>
                                </label>

                                <div class="col-lg-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control m-input
                                        {{ $errors->has('last_name') ? 'form-control-danger' :'' }}" placeholder="Please enter a lastname"
                                            value="{{ old('last_name') }}">

                                    @if ($errors->has('last_name'))
                                        <div id="last_name-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('last_name') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Lastname -->

                            <!-- Email -->
                            <div class="form-group m-form__group row {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <label for="email" class="col-lg-2 col-form-label">
                                    Email <span class="m--font-danger">*</span>
                                </label>

                                <div class="col-lg-6">
                                    <input type="text" name="email" id="email" class="form-control m-input
                                        {{ $errors->has('email') ? 'form-control-danger' :'' }}" placeholder="Please enter an email"
                                            value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <div id="email-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Email -->

                            <!-- Birthdate -->
                            <div class="form-group m-form__group row {{ $errors->has('birthdate') ? 'has-danger' : '' }}">
                                <label for="birthdate" class="col-lg-2 col-form-label">
                                    Birthdate
                                </label>

                                <div class="col-lg-6">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-calendar"></i></span>
                                        </div>

                                        <input type="text" name="birthdate" id="birthdate" class="form-control m-input
                                            {{ $errors->has('birthdate') ? 'form-control-danger' :'' }}"
                                                placeholder="Please enter birthdate" value="{{ old('birthdate') }}" readonly>
                                    </div>

                                    @if ($errors->has('birthdate'))
                                        <div id="birthdate-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('birthdate') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Birthdate -->

                            <!-- Gender -->
                            <div class="form-group m-form__group row {{ $errors->has('gender') ? 'has-danger' : '' }}">
                                <label for="gender" class="col-lg-2 col-form-label">
                                    Gender
                                </label>

                                <div class="col-lg-6">
                                    <select name="gender" id="gender" class="form-control m-bootstrap-select">
                                        <option value="" disabled selected>Please select gender</option>
                                        <option value="male" {{ strtolower(old('gender')) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ strtolower(old('gender')) == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <div id="gender-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('gender') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"></span>
                                </div>
                            </div>
                            <!--/. Gender -->

                            <!-- Address -->
                            <div class="form-group m-form__group row {{ $errors->has('address') ? 'has-danger' : '' }}">
                                <label for="address" class="col-lg-2 col-form-label">
                                    Address
                                </label>

                                <div class="col-lg-6">
                                    <textarea name="address" id="address" class="form-control m-input" {{ $errors->has('address') ?
                                        'form-control-danger' :'' }} rows="3">{{ old('address') }}</textarea>

                                    @if ($errors->has('address'))
                                        <div id="address-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('address') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--/. Address -->

                            <!-- Phone number -->
                            <div class="form-group m-form__group row {{ $errors->has('phone_number') ? 'has-danger' : '' }}">
                                <label for="last_name" class="col-lg-2 col-form-label">Phone number: </label>

                                <div class="col-lg-6">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-phone"></i></span>
                                        </div>

                                        <input type="text" name="phone_number" id="phone_number" class="form-control m-input
                                            {{ $errors->has('phone_number') ? 'form-control-danger' :'' }}"
                                                placeholder="Please enter phone number" value="{{ old('phone_number') }}">
                                    </div>

                                    @if ($errors->has('phone_number'))
                                        <div id="phone_number-error" class="form-control-feedback">
                                            <span class="m--font-danger">{{ $errors->first('phone_number') }}</span>
                                        </div>
                                    @endif

                                    <span class="m-form__help"><code>(+63) 999-9999999</code></span>
                                </div>
                            </div>
                            <!--/. Phone number -->

                            <!-- Bottom -->
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit box box-solid">
                                <div class="m-section" style="padding: 2.2rem 2.2rem;">
                                    <div class="m-section__content">
                                        <div class="d-flex justify-content-end" data-attribute="confirmable">
                                            <div>
                                                <button type="submit" class="btn btn-brand">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/. Bottom -->
                        </div>
                    </form>
                </div>

            @else
            <!--/. New user -->

            <!-- Existing user -->
                <!-- Portlet -->
                <div class="m-portlet m-portlet--mobile">
                    <!-- Portlet head -->
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    This is the list of users
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--/. Portlet head -->

                    <!-- Portlet body -->
                    <div class="m-portlet__body">
                        <!--begin: Search Form -->
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">
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

                        <!-- Users -->
                        <table id="table" class="m-datatable" width="100%" data-form="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Reservations</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->reservations->count() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>
                                            <span class="d-flex" style="overflow: visible;">
                                                <a href="javascript:void(0);" data-form="#checkoutUser"
                                                    data-action="{{ route('root.reservation.store', $user) }}"
                                                    data-toggle="modal"
                                                    data-target="#checkoutUserConfirmation"
                                                    data-user-name="{{ $user->titled_full_name }}"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill checkout-user"
                                                    title="Checkout user">
                                                    <i class="la la-check-circle"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--/. Users -->
                    </div>
                    <!--/. Portlet body -->
                </div>
                <!--/. Portlet -->
            @endif
            <!--/. Existing user -->

        </div>
    </div>

    <!-- Checkout Form -->
    <form method="POST" action="" id="checkoutUser" style="display: none;">
        {{ csrf_field() }}
    </form>

    <!-- Checkout user Modal -->
    @component('root.components.modal')
        @slot('name')
            checkoutUserConfirmation
        @endslot

        <div id="checkout-user-modal-text"></div>
    @endcomponent

@endsection

@section('scripts')
    <script>
        var reservation = function () {
            // form validate
            var formValidationInit = function () {
                $("form[id=form-reservation-store]").validate({
                    rules: {
                        first_name: {
                            required: true,
                            maxlength: 255
                        },
                        middle_name: {
                            maxlength: 255
                        },
                        last_name: {
                            required: true,
                            maxlength: 255
                        },
                        email: {
                            email: true,
                            required: true,
                            maxlength: 255
                        },
                        address: {
                            maxlength: 510
                        },
                        phone_number: {
                            maxlength: 255
                        }
                    },

                    invalidHandler: function(event, validator) {
                        var form = $('form[id=form-user-store]');

                        mApp.scrollTo(form, -150);
                    },
                });
            }
            //. form validate

            // input masks
            var inputMasksInit = function () {
                // email
                $('input[id=email]').inputmask({
                    mask: "*{1,50}[.*{1,50}][.*{1,50}][.*{1,50}]@*{1,50}[.*{2,6}][.*{1,2}]",
                    greedy: false,
                    onBeforePaste: function (pastedValue, opts) {
                        pastedValue = pastedValue.toLowerCase();
                        return pastedValue.replace("mailto:", "");
                    },
                    definitions: {
                        '*': {
                            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                            cardinality: 1,
                            casing: "lower"
                        }
                    }
                });
                //. email

                // phone number
                $('input[id=phone_number]').inputmask("mask", {
                    "mask": "(+63) 999-9999999"
                });
                //. phone number
            }
            // input masks

            // dates
            var datesInit = function () {
                $('input[id=birthdate]').datepicker({
                    format: 'yyyy-mm-dd',
                    orientation: "bottom left",
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                });
            }
            //. dates

            // select
            var selectInit = function () {
                $('select[id=gender]').selectpicker({
                    //
                });
            }
            //. select

            // users init
            var usersInit = function() {

                var datatable = $('#table').mDatatable({
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
                            field: 'Customer',
                            width: 175,
                            template: function(data) {
                                var number = mUtil.getRandomInt(1, 14);
                                var image;

                                if (image == '') {
                                    output =    '<div class="m-card-user m-card-user--sm">\
                                                    <div class="m-card-user__pic">\
                                                        <img src="' + image + '" class="m--img-rounded m--marginless" alt="photo">\
                                                    </div>\
                                                    <div class="m-card-user__details">\
                                                        <span class="m-card-user__name">' + data.Customer + '</span>\
                                                        <a href="" class="m-card-user__email m-link">' + data.Customer + '</a>\
                                                    </div>\
                                                </div>';
                                } else {
                                    var stateNo = mUtil.getRandomInt(0, 7);

                                    var states = [
                                        'success',
                                        'brand',
                                        'danger',
                                        'accent',
                                        'warning',
                                        'metal',
                                        'primary',
                                        'info'
                                    ];

                                    var state = states[stateNo];
                                }

                                output =    '<div class="m-card-user m-card-user--sm">\
                                                <div class="m-card-user__pic">\
                                                    <div class="m-card-user__no-photo m--bg-fill-' + state + '">\
                                                        <span>' + data.Customer.substring(0, 1) + '</span>\
                                                    </div>\
                                                </div>\
                                                <div class="m-card-user__details">\
                                                    <span class="m-card-user__name">' + data.Customer + '</span>\
                                                </div>\
                                            </div>';

                                return output;
                            },
                        },
                        {
                            field: 'Reservations',
                            width: 100
                        },
                        {
                            field: 'Email',
                            width: 150
                        },
                        {
                            field: 'Phone',
                            width: 100
                        },
                        {
                            field: 'Actions',
                            width: 100,
                            sortable: false
                        }
                    ],
                });
            };

            return {
                init: function() {
                    formValidationInit();
                    inputMasksInit();
                    datesInit();
                    selectInit();
                    usersInit();
                }
            };
        }();

        $(document).ready(function() {
            reservation.init();

            // checkout user confirmation.
            $('.checkout-user').on('click', function(e) {
                e.preventDefault();

                var link = $(this);
                var form = $(link.data('form'));
                var action = link.data('action');
                var modal = $(link.data('target'));
                var user_name = link.data('user-name');

                // assign action to hidden form action attribute.
                form.attr({action: action});

                // set modal text.
                $('#checkout-user-modal-text').html(
                    "<p>You are checking this reservation out for \
                        <span class='m--font-bolder'>" + user_name + ".</span>\
                    </p>"
                );

                modal.modal({ backdrop: 'static', keyboard: false}).on('click', '#btn-confirm', function() {
                    form.submit();
                });
            });
        });
    </script>
@endsection