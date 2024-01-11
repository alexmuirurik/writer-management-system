@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category d-inline"><i class="fas fa-baby"></i> Current Balance</h6>
                    </div>
                    <div class="card-body text-secondary">
                        <div class="user-balance w-100 d-inline-flex justify-content-between ">
                            <h5 class="title d-inline invoice"><i class="fa fa-angle-right me-1"></i><a
                                    href="javascript:void()">Balance:</a></h5>
                            <h5 class="title" title="Add Funds">
                                <a href="/billing" style="color: #04a688">
                                    $666.25 <i class="ml-1 fa fa-circle-plus"></i>
                                </a>
                            </h5>
                        </div>
                        <div class="funds d-none mt-1 bg-light rounded-sm">
                            <div class="rowa px-3 mt-3 w-100 d-inline-flex justify-content-between">
                                <h5 class="title d-inline">In Writing:</h5>
                                <h6 class="title">$3</h6>
                            </div>
                            <div class="rowa px-3 pr-3 w-100 d-inline-flex justify-content-between">
                                <h5 class="title d-inline">Pending Review:</h5>
                                <h6 class="title">$0</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6 class="d-inline task-titlep">Todo List</h6>
                    </div>
                    <div class="card-body">
                        <div class="task-contentp">
                            <div class="add-items d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="What you doing today?" onkeyup="todolist(event)">
                            </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse todo-list todo-list-success" id="copyscibersclient">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6 class="d-inline task-titlep">Count Down Timer</h6>
                    </div>
                    <div class="card-body">
                        <div class="task-conte" style="max-height: 450px">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="timer" class="form-control timer font-weight-bold"
                                        placeholder="0 sec" style="font-size: 14px;">
                                </div>
                                <div class="col-md-12 d-inline-flex justify-content-between mt-2" style="overflow: hidden">
                                    <button class="btn btn-success start-timer-btn w-50 border rounded p-2 hidden">Start</button>
                                    <button class="btn-success resume-timer-btn w-50 p-2 hidden d-none">Resume</button>
                                    <button class="pause-timer-btn btn-neutral rounded border w-50 d-none">Pause</button>
                                    <button class="btn-danger remove-timer-btn rounded p-2 border w-50 ml-2 d-none">Remove
                                        Timer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6 class="card-category"><i class="fas fa-baby"></i> Pending Author</h6>
                            </div>
                            <div class="card-body">
                                <p class="card-title"><a href="#">2 Tasks</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6 class="card-category"><i class="fas fa-usd"></i> Pending Payment</h6>
                            </div>
                            <div class="card-body">
                                <p class="card-title"><a href="/payment">0 Tasks</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6 class="card-category"><i class="fas fa-box"></i> Completed</h6>
                            </div>
                            <div class="card-body">
                                <p class="card-title"><a href="/task/completed">0 Tasks</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="writing">
                    <div class="card card-tasks">
                        <div class="card-header ">
                            <h6 class="title d-inline">Task in Progress</h6>
                            <p class="card-category d-inline">(3 Tasks)</p>
                            <div class="dropdown float-right">
                                <p class="title">Total Funds: $33.75 </p>
                            </div>
                        </div>
                        <div class="card-body pl-0 pr-0">
                            <div class="table-full-width table-responsive ps">
                                <table class="table table-sm table-stripped datatables"
                                    style="background-color: var(--bgcopy) !important;">
                                    <tbody>
                                        <tr>
                                            <td class="border-end">
                                                <small class="p-0">1</small>
                                            </td>
                                            <td class="" style="width: 45% !important">
                                                <small class="title"><a href="/task/usuisa">USUIsa</a></small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="310"> 900 Words</small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="310"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    <strong></strong>
                                                </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="310"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    ASAP </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="310"> 2 Words</small>
                                            </td>
                                            <td class="td-actions border-start">
                                                <a class=" title pl-2" type="button" tasktitle="USUIsa" title="Assign"
                                                    url="/task/usuisa"
                                                    onclick="assignarticle($(this).attr('url'), $(this).attr('tasktitle'))">
                                                    <i class="fa-solid fa-user-clock m-auto"
                                                        style="color: #00bf9a; font-size: 12px !important;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-end">
                                                <small class="p-0">2</small>
                                            </td>
                                            <td class="" style="width: 45% !important">
                                                <small class="title"><a href="/task/lkfdklfd-klfd-dfklfd-dfkldf">lkfdklfd
                                                        klfd dfklfd dfkldf</a></small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="309"> 900 Words</small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="309"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    <strong>Writer Account</strong>
                                                </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="309"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    3 months ago </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="309"> 3 Words</small>
                                            </td>
                                            <td class="td-actions border-start">
                                                <a class=" title pl-2" type="button" title="Archive"
                                                    url="/task/lkfdklfd-klfd-dfklfd-dfkldf"
                                                    onclick="rejectarticle($(this).attr('url'))"><i
                                                        class="fa fa-archive m-auto"
                                                        style="color: #00bf9a; font-size: 12px !important;"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-end">
                                                <small class="p-0">3</small>
                                            </td>
                                            <td class="" style="width: 45% !important">
                                                <small class="title"><a href="/task/dslkds-sdklsdl-lsdlsd-lksd">dslkds
                                                        sdklsdl lsdlsd lksd</a></small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="308"> 900 Words</small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="308"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    <strong></strong>
                                                </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted" id="308"
                                                    onclick="showcontent($(this).attr('id'))">
                                                    ASAP </small>
                                            </td>
                                            <td class="">
                                                <small class="text-muted text-small" id="308"> 4 Words</small>
                                            </td>
                                            <td class="td-actions border-start">
                                                <a class=" title pl-2" type="button"
                                                    tasktitle="dslkds sdklsdl lsdlsd lksd" title="Assign"
                                                    url="/task/dslkds-sdklsdl-lsdlsd-lksd"
                                                    onclick="assignarticle($(this).attr('url'), $(this).attr('tasktitle'))">
                                                    <i class="fa-solid fa-user-clock m-auto"
                                                        style="color: #00bf9a; font-size: 12px !important;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
