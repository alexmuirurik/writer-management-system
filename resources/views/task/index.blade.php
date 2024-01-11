@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-2">
                <div class="card text-center">
                    <div class="card-header">
                        <p class="title">Unpaid Funds</p>
                    </div>
                    <div class="card-body">
                        <p><strong><a class="pays" href="/payment">$0.00 Total</a></strong></p>
                    </div>
                </div>
                <div class="card card-body instructions text-center">
                    <h3 class="mb-1 task-titlep">Task Content</h3>
                    <p class="task-contentp">Click on Task Content to read the content and other details</p>
                </div>
            </div>
            <div class="col-lg-10 order-md-1">
                <div class="table-responsive pendinglist">
                    <div class="Approved">
                        <div class="listpaginate">
                            <div class="card card-tasks">
                                <div class="card-header ">
                                    <h6 class="title d-inline">Completed</h6>
                                    <p class="card-category d-inline">(0 Tasks)</p>
                                    <div class="dropdown float-right">
                                        <p class="title">Total Funds: $0.00 </p>
                                    </div>
                                </div>
                                <div class="card-body pl-0 pr-0">
                                    <div class="table-full-width table-responsive ps">
                                        <table class="table table-sm table-stripped datatables"
                                            style="background-color: var(--bgcopy) !important;">
                                            <tbody>
                                                <tr>
                                                    <td><small>There are no tasks available to display right now.</small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
