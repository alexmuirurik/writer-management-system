@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card mb-1">
                    <div class="card-header">
                        <h5 class="title">Active Projects</h5>
                    </div>
                </div>
                <ul class="p-0 m-0 mb-3">
                    <div class="card chat_list rounded shadow p-1 m-0 mb-2">
                        <div class="card-body p-1 chat_people">
                            <div class="chat_img online"> <img class="img-fluid avatar" src="/assets/img/default-avatar.png" alt="sunil"></div>
                            <div class="chat_ib">
                                <h6 class="nameses"><a href="recruit/">John Maina </a></h6>
                                <small class="text-muted">Worked on 1 Tasks</small>
                                <input type="hidden" class="vname"  value="<br /><b>Warning</b>:  Undefined variable $vname in <b>C:\Apache24\htdocs\copyscribers\views\list\writer.php</b> on line <b>7</b><br />">
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="card card-tasks">
                    <div class="card-header d-inline-flex justify-content-between p-0">
                        <h5 class="mt-3 ms-2 title">Ongoing Projects</h5>
                        <div class="dropdown inline-flex">
                            <button type="button" class="btn btn-success p-2 rounded" data-toggle="modal"
                                data-target="#projectModal" data-backdrop="static" style="border:1px solid gray !important">
                                <i class="fa fa-folder-plus mr-2"></i>
                                Create a New Project
                            </button>
                            <div class="modal fade" id="projectModal" tabindex="-1" role="dialog"
                                aria-labelledby="projectModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="projectModalLabel">Create a New Project</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="create-project" onsubmit="event.preventDefault(); createproject();"
                                                method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="tasktitle">Project Title</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        placeholder="Task Title" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Instructions">Project Instructions</label>
                                                    <textarea class="form-control modal-editor" id="instructions" name="instructions" rows="3" required=""
                                                    ></textarea>
                                                </div>
                                                <div class="form-group d-flex justify-content-between">
                                                    <div class="w-50 mr-2">
                                                        <label for="wordcount">Project Manager</label>
                                                        <select name="editor" id="editor" class="form-control">
                                                            <option class="form-control" value="self-managed">
                                                                Self-Managed: I'll Recruit and Manage My Team</option>
                                                            <option class="form-control" value="copyscribers">CopyScribers
                                                                Decides Who to Assign My Work</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-50 ml-2">
                                                        <label for="budget">Website</label>
                                                        <input type="url" class=" form-control custom-range pl-2"
                                                            value="" id="site" name="site"
                                                            placeholder="Publishing site">
                                                    </div>
                                                </div>
                                                <div class="row d-none">
                                                    <div class="form-group col">
                                                        <label for="wordcount">Pay Per Word</label>
                                                        <input type="hidden" class="form-control custom-range"
                                                            min="0.015" max="0.03" step="0.005" name="budget"
                                                            id="budget" value="0.015" required="">
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <input type="submit" class="btn btn-primary btn-sm">
                                                </div>
                                            </form>
                                            <script>
                                                function createproject() {
                                                    var project = $('#create-project').serializeArray()
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "/project/create",
                                                        data: project,
                                                        success: function(msg) {
                                                            blackDashboard.showSidebarMessage('Project Created...')
                                                            $(".projectlisted").load("/project .projectlisted > *")
                                                            $('#create-project').trigger('reset')
                                                        },
                                                        failure: function(msg) {
                                                            blackDashboard.showSidebarMessage(msg)
                                                        }
                                                    })
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row icons-list projectlisted">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <i class="fa fa-folder-open me-2"></i>
                        <div class="item">
                            <p class="title mb-0"><a href="/project/php-website-content">PHP Website content</a></p>
                            <div class="items">
                                <small class="small text-muted"><strong>0</strong> In Writing <strong>0</strong> In Review</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <i class="fa fa-folder-open me-2"></i>
                        <div class="item">
                            <p class="title mb-0"><a href="/project/test">Test</a></p>
                            <div class="items">
                                <small class="small text-muted"><strong>0</strong> In Writing <strong>0</strong> In Review</small>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('.projecta').click(function() {
                        event.preventDefault()
                        var href = $(this).attr('href')
                        $('.icons-list').load(href + ' .icons-list > *').fadeIn('slow')
                    })
                </script>
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
                                            <td>
                                                <small>There are no tasks available to display right now.</small>
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
