<footer class="footer">
    <div class="d-flex container-fluid">
        <div class="col">
            <ul class="">
                <li class="nav-item"><small>Copyright @ CopyScribers.com</small></li>
            </ul>
        </div>
        <div class="col">
            <ul class="text-end me-4">
                <li class="nav-item">Privacy Policy</li>
                <li class="nav-item">Disclaimer</li>
                <li class="nav-item">About Us</li>
                <li class="nav-item">Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Assign This Article?</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                        style="font-size:12px">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="assigntask" class="was-validated"
                        onsubmit="event.preventDefault(); assigntasknproject();" method="post">
                        <div class="form-group">
                            <label for="projecttitle">Task Title</label>
                            <input name="title" type="text" class="tasktitle form-control" readonly=""
                                value="">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="tasktitle">Assign Author</label>
                                <select class="form-control" name="author" id="projecttitle" required="">
                                    <option value="anyauthor">Return to Pool</option>
                                    <option value="writeraccount">--Writer Account</option>
                                    <option value="writing">Mark as Taken</option>
                                    <option value="pending-approval">Mark as Pending Approval</option>
                                    <option value="approved">Mark as Approved</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div class="col-lg-12 pl-0 pr-0 mt-2">
                            <button class="float-left btn-danger rounded p-2 w-25" type="button"
                                data-dismiss="modal">Close</button>
                            <input type="hidden" class="taskurl" name="url" value="">
                            <input type="hidden" name="assignmodal" id="assignmodal" value="assignmodal">
                            <button type="submit" class="btn btn-success float-right mr-0 w-25">Assign</button>
                        </div>
                    </form>
                    <script></script>
                </div>
            </div>
        </div>
    </div>
</footer>
