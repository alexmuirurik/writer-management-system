@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card mb-1">
                    <div class="card-header">
                        <h5 class="title">Active Users</h5>
                    </div>
                </div>
                <div class="row icons-list">

                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="card card-tasks">
                    <div class="card-header d-inline-flex justify-content-between p-0">
                        <ul class="nav nav-tabs flex-left">
                            <li class="nav-item">
                                <a href="/project/incomplete" class="nav-link projecta title">Listing All Users</a>
                            </li>
                        </ul>
                        <div class="dropdown inline-flex">
                            <button type="button" class="btn-success p-2 rounded" data-toggle="modal"
                                data-target="#projectModal" data-backdrop="static" style="border:1px solid gray !important">
                                <i class="fa fa-folder-plus mr-2"></i>
                                Add New Writer
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row icons-list projectlisted">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/anthony-kinyua">Anthony Kinyua</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Client</strong> Approved 1687516891 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/jw">J W</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Client</strong> Approved 1686244784 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/akbbhhhh">Akbb Hhhh</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Client</strong> Approved 1685643207 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/writeraccount">Writer Account</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Writer</strong> Approved 1685326401 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/copyscibersclient">Copyscibers Client</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Client</strong> Approved 1685325868 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <img class="img-fluid avatar recruitlist" src="/assets/img/default-avatar.png" alt="" srcset="">
                        <div class="item">
                            <p class="title"><a href="/recruit/alexmuiruri">Alex Muiruri</a></p>
                            <div class="items">
                                <p class="small text-muted"><strong>Admin</strong> Approved 1685308327 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car border-top"></div>

                <div class="mt-3">
                    <div class="card card-tasks">
                        <div class="card-header ">
                            <h6 class="title d-inline">Personal Tasks</h6>
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
            </div>

        </div>

        <!-- Invite modal -->
        <div class="modal-email">
            <div class="modal fade show" id="testarticleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom pb-2">
                            <h5 class="modal-title">Create a Test Article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="font-size:12px">X</button>
                        </div>
                        <div class="modal-body">
                            <form id="company-form" method="post"
                                onsubmit="recruitdescription('company-form', 'apply')">
                                <div class="form-group">
                                    <label class="form-label" for="job_title">
                                        Test Article Title <span class="form-required">*</span>
                                    </label>
                                    <input id="test-title" name="test-title" type="text"
                                        class="form-control form-input" placeholder="Enter Task Title Here"
                                        value="Test Article" required="">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="category">Wordcount</label>
                                    <input id="wordcount" name="wordcount" type="number"
                                        class="form-control form-input" placeholder="Enter task Wordcount Here"
                                        value="900" required="">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="job_description">
                                        Test Instructions <span class="wpjb-required">*</span>
                                    </label>
                                    <textarea name="instructions" id="instructions" cols="30" rows="10" class="form-control modal-editor"
                                        required="" aria-hidden="true" style="display: none;">&lt;p&gt;We are looking for an advanced writer for articles related to payday loans. We expect long and advanced guides that will be at the top and rank high. There we expect to post the best articles online. We work mainly in the bad credit loan section.&lt;/p&gt;
&lt;p&gt;Our articles are related to no credit check loans. In them, we post advanced articles with reviewers on top products that are better than payday loans. So people can get cheaper loans if they are with bad credit. Here is one example of an article on the best no credit check loans guaranteed approval by direct lender:&lt;/p&gt;</textarea>
                                </div>

                                <div class="form-group d-flex">
                                    <button type="submit" class="btn btn-success btn-sm ml-auto">Submit
                                        Instructions</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
