@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8 order-md-1">
                <div class="card card-tasks">
                    <div class="card-header">
                        <h5 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted mb-1">Your recent payments</span>
                            <span class="badge badge-secondary badge-pill">Current Balance: $688.75</span>
                        </h5>
                    </div>

                    <div class="card-body p-0 pt-2 pb-3">
                        <div class="table-responsive ps">
                            <table class="table no-wrap user-table mb-0"
                                style="background-color: var(--bgcopy) !important;">
                                <tbody class="userlit">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 order-md-2 mb-4">
                <form id="subittib" method="post" class="was-validated">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3 text-muted">Add Funds to Your Account</h5>
                        </div>
                        <div class="card-body rounded shadow pt-1">
                            <div class="form-group">
                                <label for="recipient-name" class="form-label">Amount to Pay</label>
                                <input type="number" class="form-control custom-range" min="5" max="20000"
                                    step="5" id="recipient-pay" value="5" placeholder="Min $5" required="">
                                <div class="invalid-feedback">
                                    Please enter a payamount.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <ul role="tablist" class="nav nav-pills nav-fill mb-2">
                                <li class="nav-item ml-1">
                                    <a data-toggle="pill" href="#paypal" class="nav-link active"> <i
                                            class="fab fa-paypal mr-2"></i> Paypal
                                    </a>
                                </li>
                            </ul>
                            <!-- End -->
                        </div>
                        <!-- Credit card form content -->
                        <div class="card-body tab-content">
                            <div id="paypal" class="tab-pane text-center fade  show active  pt-2">
                                <small class="text-muted">
                                    Note: After clicking on the button, you will be directed to a secure gateway for
                                    payment. After completing the payment process, you will be redirected back to the
                                    website to view details of your order.
                                </small>
                                <div id="paypal-button-container" class="mt-2">
                                </div>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </form>
                <script>
                    $('#recipient-pay').on('keyup keydown keypress', function(event) {
                        if (event.keyCode === 13) {
                            event.preventDefault()
                        }
                    })

                    $('#recipient-pay').on('change', function(event) {
                        payamount = $(this).val()
                    })

                    function billmpesa(amount) {
                        if (amount) {
                            $.ajax({
                                type: "POST",
                                url: "/billing",
                                data: {
                                    'safaricom': amount
                                },
                                success: function(msg) {
                                    blackDashboard.showSidebarMessage(msg)
                                    return msg;
                                }
                            })
                            return blackDashboard.showSidebarMessage('Check the USSD Prompt on Your Phone')
                        }
                        return blackDashboard.showDangerMessage('Error: payamount is not defined')
                    }

                    function mpesapayment() {
                        payamount = $('#recipient-pay').val() * 105

                        if (!payamount) {
                            return blackDashboard.showDangerMessage('Error: payamount is not defined')
                        }

                        swal({
                            title: 'Pay ' + payamount + ' Ksh With Mpesa',
                            text: "Check your Mobile Phone for an STK push. We're going to bill you " + payamount +
                                " Ksh from Mpesa.",
                            buttons: ["Cancel", "Pay with Mpesa"],
                        }).then((value) => {
                            if (value && payamount) {
                                return billmpesa(payamount)
                            }
                        })
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
