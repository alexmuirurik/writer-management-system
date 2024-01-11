@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Currently Ongoing Tasks</h5>
                    </div>
                    <div class="card-body pt-0 pl-0 pr-md-1 border-left mt-2 mb-2 shadow"
                        style="position:relative; max-height: 600px !important; overflow-y: overlay">
                        <div class="users">
                            <div class="chat_list mt-0 active_chat">
                                <div class="chat_people">
                                    <div class="chat_img online"> 
                                        <img class="img-fluid avatar" src="/assets/img/default-avatar.png" alt="sunil">
                                    </div>
                                    <div class="chat_ib">
                                        <h6 class="nameses"><a href="#">Group Chat</a></h6>
                                        <small class="text-muted">General chats with your writers/client</small>
                                        <input type="hidden" class="vname" value="group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-inline-flex justify-content-between pt-0 pr-0">
                        <div class="left-sided w-75 d-inline-flex  mt-2 ">
                            <div class="message-title mr-2">
                                <h5 class="title m-0 pt-1 pb-0">#General Group</h5>
                            </div> |
                            <div class="sub-title-user ml-2">
                                <small>Chat belonging to Client</small>
                            </div>
                        </div>
                        <div class="dropdown float-right">
                            <p class="title me-2">3 Messages</p>
                        </div>
                    </div>
                    <div class="card-body border-2">
                        <div class="msg_history mt-0 p-2 d-flex"
                            style="height:600px; flex-direction: column-reverse">
                        </div>
                        <div class="type_msg border-0 mt-3">
                            <div class="input_msg_write d-inline-flex w-100 border-right">
                                <textarea type="text" id="message" name="message" style="min-height: 3vh; max-height: 6vh;"
                                    class="form-control border write_msg" placeholder="Type a message" onkeyup="chitchat(event)"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var scrolled = false;

            function updateScroll() {
                if (!scrolled) {
                    $('.msg_history').animate({
                        scrollTop: $('.msg_history').prop("scrollHeight")
                    });
                }
            }

            $('.chat_list').click(function() {
                scrolled = false;
                $('.chat_list').removeClass('active_chat')
                $(this).addClass('active_chat')
                $('.mail-actions').removeClass('d-inline-flex').addClass('d-none')
                $('.user-title').text($('.active_chat .nameses').text())
                $('.user-title-img img').attr('src', $('.active_chat .chat_img img').attr('src'))
                refreshchat()
                setInterval(() => {
                    refreshadedchat()
                }, 10000);
                updateScroll();
            })

            $('.name_title').click(function() {
                $('.msg_history').fadeOut().load('/message .msg_history > *').fadeIn()
                $('.name_title').text('All Alerts')
                $('.mail-actions').removeClass('d-none').addClass('d-inline-flex')
            })

            $('.msg_history').on('scroll', function() {
                scrolled = true;
            });

            updateScroll();
        </script>
        <style>
            .messagelisted {
                width: 100%;
                border-left: 1px solid rgba(101, 103, 119, 0.21);
            }

            .received_withd_msg p,
            .sent_msg p {
                color: black;
            }

            .incoming_msg,
            .outgoing_msg {
                display: inline-table;
            }

            .time_date {
                display: none;
            }
        </style>

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
                            <br>
                            <b>Warning</b>: include(C:/Apache24/htdocs/copyscribers/views/form/test-article.htm): Failed to
                            open stream: No such file or directory in
                            <b>C:\Apache24\htdocs\copyscribers\views\template\messages.php</b> on line <b>131</b><br>
                            <br>
                            <b>Warning</b>: include(): Failed opening
                            'C:/Apache24/htdocs/copyscribers/views/form/test-article.htm' for inclusion
                            (include_path='.;C:\php\pear') in
                            <b>C:\Apache24\htdocs\copyscribers\views\template\messages.php</b> on line <b>131</b><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
