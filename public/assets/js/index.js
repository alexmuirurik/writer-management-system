var sidebarmini = localStorage.getItem("sidebarmini")
var background = localStorage.getItem("background")

if (!background) {
    localStorage.setItem("background", "light")
    var background = localStorage.getItem("background")
}

if (sidebarmini == "true") {
    $('.sidebar-i').removeClass('fa-angle-left').addClass('fa-angle-right')
    $('body').addClass('sidebar-mini')
}

if (background == "light") {
    $('body').addClass('white-content')
    $('.light-badge').addClass('d-none')
}

if (background == 'dark') {
    $('body').removeClass('white-content')
    $('.dark-badge').addClass('d-none')
}

function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
}

function lightmode() {
    if (!$('body').hasClass('white-content')) {
        $('body').addClass('white-content')
        background = localStorage.setItem("background", "light")
        $('.light-badge').addClass('d-none')
        $('.dark-badge').removeClass('d-none')
        // blackDashboard.showSidebarMessage('Light Mode Ignited...')
        tinymce.remove()
        tinymced();
    }
}
  
function responseMessage(msg) {
    $('.success-box').fadeIn(200);  
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

function darkmode() {
    if ($('body').hasClass('white-content')) {
        $('body').removeClass('white-content')
        background = localStorage.setItem("background", "dark")
        $('.dark-badge').addClass('d-none')
        $('.light-badge').removeClass('d-none')
        // blackDashboard.showSidebarMessage('Dark Mode Enabled...')
        tinymce.remove()
        tinymced();
    }
}

function contentexcerpt(str) {
    if (str.length > 160) {
        str = str.substring(0, 10) + "..."
    }
    return str
}

function fetch_data(ahref) {

    $.get(ahref, function (data, status) {

        var body = $(data)

        $(".main-panel").load(ahref, '.main-panel')

        window.history.pushState("", "Title", "dashboard")

        var url = window.location.href

        var target = url.split('/')

        var title = target[target.length - 1]

        sidebar_light(ahref)

        if (title === "") {
            title = "Dashboard"
        }

        document.title = ucFirst(title) + " | CopyScribers - https://copyscribers.com"
    })
}

function sidebar_light(ahref) {
    var object = 'li'
    $(object).each(function () {
        if ($(this).find('a').attr('href') === ahref) {
            $(object).removeClass('active');
            $(this).removeClass('active').addClass('active');
        }
    });
}

$(document).ready(function () {
    $('input[type="file"]').on("change", function () {
        let filenames = [];
        let files = this.files;
        if (files.length > 1) {
            filenames.push("Total Files (" + files.length + ")");
        } else {
            for (let i in files) {
                if (files.hasOwnProperty(i)) {
                    filenames.push(files[i].name);
                }
            }
        }
        $(this).next(".custom-file-label").html(filenames.join(","));
    })
})

function todolist(event) {
    if (event.keyCode === 13) {
        event.preventDefault();

        var todoListItem = $('.todo-list');
        var todoListInput = $('.todo-list-input')
        var user = $(todoListItem).attr('id')
        var item = $(todoListInput).val();

        if (item) {
            $.ajax({
                type: "POST",
                url: "/message/" + user,
                data: { 'note': String(item) },
                success: function (msg) {
                    if (msg === 'Created') {
                        todoListItem.append("<li class='d-inline-flex'><div class='form-check form-check-flat d-flex mt-2'><i class='remove fa fa-book'></i><label class='pl-1 note form-check-label'>" + item + "</label><i class='remove fa-solid fa-circle-xmark m-auto'></i></div></li>");
                        return todoListInput.val("");
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    }
}

(function ($) {
    'use strict';
    $(function () {
        var todoListItem = $('.todo-list');
        var todoListInput = $('.todo-list-input');

        todoListItem.on('click', '.fa.fa-book', function () {
            if ($(this).attr('checked')) {
                $(this).removeAttr('checked');
            } else {
                $(this).attr('checked', 'checked');
            } $(this).closest("li").toggleClass('completed');

        });

        todoListItem.on('click', '.remove', function () {
            var note = $(this).parent()
            var delet = note.children('.note').html()
            $.ajax({
                type: "POST",
                url: "/message/" + delet,
                data: { 'delet': delet },
                success: function (msg) {
                    if (msg == 'deleted') {
                        note.remove()
                        return blackDashboard.showSidebarMessage(msg)
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        })
    })
})(jQuery)

function chitchat(event) {
    if (event.keyCode === 13) {
        event.preventDefault()
        var chit = $('.msg_history')
        var chat = $('#message')
        let date = new Date()
        let timestamp = date.toDateString()
        var chitchat = $(chat).val()

        var receiver = $('.active_chat .vname').attr('value')
        chat.val("")
        if (!receiver) {
            return alert('select user')
        }

        if (chitchat) {
            htm = '<div class="outgoing_msg"> <div class="sent_msg"><span class="time_date">Direct Message...</span><p>'+chitchat+'</p><span class="time_date">'+timestamp+' seconds ago</span></div></div>'
            $('.msg_history').prepend(htm)
            $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight)

            $.ajax({
                type: "POST",
                url: "/message/" + receiver,
                data: { 'chit': 'chit', 'content': String(chitchat), 'receiver': receiver },
                success: function (msg) {
                    if (msg === 'Created') {
                        return refreshchat()
                    } else {
                        chat.val(chitchat)
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    }
}

function refreshchat() {
    username = $(".active_chat .vname").attr('value')
    $.ajax({
        type: "POST",
        url: "/message/" + username,
        data: { 'chat': 'chat' },
        success: function (msg) {
            if (msg !== $('.msg_history').html()) {
                $('.msg_history').html(msg)
                $('.notifacto').addClass('d-none')
            }

        }
    })
}

function refreshadedchat() {
    username = $(".active_chat .vname").attr('value') 
    $.ajax({
        type: "POST",
        url: "/message/" + username,
        data: { 'chated': 'chated' },
        success: function (msg) {
            if (msg) {
                $('.msg_history').prepend(msg)
                $('#myAudio')[0].play() 
            }
        }
    })
}

function getedits() {
    receiver = $('.vname').attr('value')
    task = $('.tname').attr('value')

    $.ajax({
        type: "POST",
        url: "/message/" + receiver,
        data: { 'task': task },
        success: function (msg) {
            $('.msg_history').html(msg)
            $('.incoming_msg_img img').css({ width: '20px', height: '20px' })
            var projecthref = '/task/' + $('.tname').attr('value')
            $('.notifacto').load(projecthref + ' .notifacto', function () {
                $(this).children(':first').unwrap();
            })
        }
    })
}

function showsidevar($sidevar) {
    $('a.nav-link').removeClass('active')
    $('a.nav-link').click(function () {
        $(this).addClass('active')
    })
    if ($sidevar === 'instructions') {
        $('.edits').addClass('d-none')
        $('.guide').addClass('d-none')
        $('a.nav-link.brief').addClass('active')
        $('.instructions').addClass('d-none').removeClass('d-none')
        clearInterval();
        return;
    }

    if ($sidevar === 'edits') {
        $('.instructions').addClass('d-none')
        $('.guide').addClass('d-none')
        $('a.nav-link.comments').addClass('active')
        $('.edits').addClass('d-none').removeClass('d-none')
        return
    }

    if ($sidevar === 'ontentp') {
        $('.editp').addClass('d-none')
        $('.ontentp').addClass('d-none').removeClass('d-none')
        return
    }

    if ($sidevar === 'editp') {
        $('.ontentp').addClass('d-none')
        $('.editp').addClass('d-none').removeClass('d-none')
        return
    }
}

function returnarticle() {
    url = $('.htref').attr('value')
    swal({
        title: "Return The Article?",
        text: "Dropping a Tasks after you've picked it could negatively affect your rating",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'return': 'return' },
                success: function (msg) {
                    if (msg == "You've Returned This Task") {
                        blackDashboard.showSidebarMessage(msg)
                        return location.href = '/task/pending-author';
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function approvearticle(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }

    const container = document.createElement("div");

    var textarea = document.createElement('textarea')
    textarea.rows = 6
    textarea.className = 'swal-content__textarea'
    textarea.placeholder = 'Any comments?'

    let wrap = document.createElement('div');
    wrap.setAttribute('class', 'text-muted');
    wrap.innerHTML = "<div class='rating-stars text-center'><ul id='stars'><li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li><li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li> <li class='star' title='Good' data-value='3'> <i class='fa fa-star fa-fw'></i></li><li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li><li class='star'title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i> </li> </ul></div>"

    var scr       = document.createElement("script");
    scr.type      = "text/javascript";
    scr.innerHTML = "ratingcss()";

    // You could also use container.innerHTML to set the content.
    container.append(wrap);
    container.append(scr)
    container.append(textarea);

    swal({
        content: container,
        title: "Approve This Article?",
        text: "Once approved, you can publish the article anywhere!",
        icon: "success",
        buttons: true,
        dangerMode: false,

    }).then((willDelete) => {
        if (willDelete) {
            rating  = parseInt($('#stars li.selected').last().data('value'), 10)
            comment = $('.swal-content__textarea').val()

            if(rating === null || rating === ''){
                rating = null
            }

            if(comment === null || comment === ''){
                comment = null
            }
            
            $.ajax({
                type: "POST",
                url: url,
                data: { 'approve': 'approve', 'comment': comment, 'rating': rating},
                success: function (msg) {
                    if (msg == "You've Approved This Task") {
                        blackDashboard.showSidebarMessage(msg)
                        return location.href = '/task/completed';
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function chendchat(event) {
    if (event.keyCode === 13) {
        var chit = $('.msg_history')
        var chat = $('#message')
        let date = new Date()
        function pad(num) {
            return String(num).padStart(2, '0');
        }
        let timestamp = pad(date.getHours()) + ':' + pad(date.getMinutes());
        var chitchat = $(chat).val()
        var selection = tinymce.activeEditor.selection.getContent()
        console.log(selection)
        var receiver = $('.vname').attr('value')
        var task = $('.tname').attr('value')
        if (!receiver) {
            return chat.val("")
        }
        chat.val("")
        htm = '<div class="outgoing_msg"> <div class="sent_msg"><span class="time_date">Direct Message...</span><p>'+chitchat+'</p><span class="time_date">'+timestamp+' seconds ago</span></div></div>'
        $('.msg_history').append(htm)
        $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight)
        
        $.ajax({
            type: "POST",
            url: "/message/" + task,
            data: { 'comment': 'comment', 'content': String(chitchat), 'receiver': receiver },
            success: function (msg) {
                if (msg === 'Created') {
                    if (chitchat) {
                        return getedits()
                    }
                }
                blackDashboard.showDangerMessage(msg)
            },
            statusCode: {
                500: function () {
                    getedits()
                    return autosaver()
                }
            }
        })
    }
}

function cleaninput(string) {
    return string.replace(/[%@,]/g, "");
}

function submittask() {
    var taskdata = $('#edit-task').serializeArray()
    var words = tinymce.activeEditor.getContent().replaceAll('<!-- [if !supportLists]-->', '').replaceAll('<!--[endif]-->', '')

    var wordcount = $('.wordcount').attr('value')
    var slug = $(".hidden").attr('value')

    theEditor = tinymce.activeEditor;
    wordCount = theEditor.plugins.wordcount.getCount();

    if (wordcount < wordcount) {
        return blackDashboard.showSidebarMessage('Meet Word Count to Submit...')
    } else {
        taskdata.push({ name: "content", value: words })
        swal({
            title: "Submit The Article?",
            text: "Before Submitting, make sure you've edited your work thoroughly'!",
            icon: "success",
            buttons: true,
            dangerMode: false,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "/task/" + slug,
                    data: $.param(taskdata),
                    success: function (msg) {
                        if (msg == 'Task Submitted!') {
                            blackDashboard.showSidebarMessage(msg)
                            return location.href = '/task/pending-approval';
                        }
                        $('.list-group.mb-3').html(msg)
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
    }
}

function autosaver(selection = null) {
    getdata()
    $('#meta').attr("disabled", true);
    var taskdata = $('#edit-task').serializeArray()
    var words = tinymce.activeEditor.getContent().replaceAll('<!-- [if !supportLists]-->', '').replaceAll('<!--[endif]-->', '')
    var wordcount = $('.wordcount').attr('value')
    var slug = $(".hidden").attr('value')
    var selection = selection
    taskdata.push({ name: "autosave", value: words, selection: selection })
    restore = $('.tox-statusbar__wordcount').html()
    editore = $('.tox-statusbar__editrequest').html()
    $('.tox-statusbar__wordcount').html('Saving...')
    $('.tox-statusbar__editrequest .nav-link').html('Saving...')
    $('#titleHelp .mr-2.float-right').remove()
    $('#titleHelp').append('<small class="mr-2 float-right">Saving...</small>')
    if (words) {
        $.ajax({
            type: "POST",
            url: "/task/" + slug,
            data: $.param(taskdata), 
            success: function (msg) {
                if (msg === 'Progress Saved') {
                    $('.tox-statusbar__wordcount').html(restore)
                    $('.tox-statusbar__editrequest').load('/task/' + slug + ' .tox-statusbar__editrequest > *')
                    $('.lastsaved').load("/task/" + slug + " .lastsaved > *", function () {
                        lastedited = $('.lastsaved').text()
                        $('#titleHelp .mr-2.float-right').remove()
                        $('#titleHelp').append('<small class="mr-2 float-right">Last Saved ' + lastedited + '</small>')
                    })
                    $('#meta').attr("disabled", false)
                    $('.contentsavings').load('/task/' + slug + ' .contentsavings > *')
                    return blackDashboard.showFooterMessage(msg)
                } else if (msg === 'We Cannot Save Nothing') {
                    return blackDashboard.showDangerMessage('We Cannot Save Nothing')
                } else if (msg === 'Error: Task Belongs to Another Client!') {
                    $('#titleHelp .mr-2.float-right').remove()
                    return $('#titleHelp').append('<small class="mr-2 float-right">' + msg + '</small>')
                }
                blackDashboard.showDangerMessage(msg)
            }
        })
    } else {
        blackDashboard.showDangerMessage('We Cannot Save Blank')
        $('#meta').attr("disabled", false)
        $('.contentsavings').load('/task/' + slug + ' .contentsavings > *')
    }
}

function showcontent(id) {
    $.each(tasklists, function (key, value) {
        if (id == value['id']) {
            var content = value['content'] ?? "The writer hasn't started working on the task..."
            var title = value['title']
            $('.task-contentp').html(content)
            $('.task-titlep').html(title)
        }
    })
}

function showinstructions(id) {
    $.each(tasklists, function (key, value) {
        if (id == value['id']) {
            var instructions = value['instructions']
            $('.instructions').html(instructions)
        }
    })
}

function claimarticle(id) {
    if (id == null) {
        var htref = $('.htref').attr('value')
    } else {
        var htref = id
    }

    $.ajax({
        type: "POST",
        url: htref,
        data: { 'claim': 'claim' },
        success: function (msg) {
            console.log(htref)
            if (msg == "You've Accepted This Task") {
                blackDashboard.showSidebarMessage(msg)
                return location.href = htref
            }
            blackDashboard.showDangerMessage(msg)
        }
    })
}

function rejectarticle(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }

    const container = document.createElement("div");

    var textarea = document.createElement('textarea')
    textarea.rows = 6
    textarea.className = 'swal-content__textarea'
    textarea.placeholder = 'Any comments?'

    let wrap = document.createElement('div');
    wrap.setAttribute('class', 'text-muted');
    wrap.innerHTML = "<div class='rating-stars text-center'><ul id='stars'><li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li><li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li> <li class='star' title='Good' data-value='3'> <i class='fa fa-star fa-fw'></i></li><li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li><li class='star'title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i> </li> </ul></div>"

    var scr       = document.createElement("script");
    scr.type      = "text/javascript";
    scr.innerHTML = "ratingcss()";

    // You could also use container.innerHTML to set the content.
    container.append(wrap);
    container.append(scr)
    container.append(textarea);

    swal({
        content: container,
        title: "Reject This Article?",
        text: "We'll Archive the task, but you can't publish the article anywhere!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            rating  = parseInt($('#stars li.selected').last().data('value'), 10)
            comment = $('.swal-content__textarea').val()

            if(rating === null || rating === ''){
                rating = null
            }

            if(comment === null || comment === ''){
                comment = null
            }

            $.ajax({
                type: "POST",
                url: url,
                data: { 'reject': 'reject', 'comment': comment, 'rating': rating},
                success: function (msg) {
                    if (msg == "You've Archived This Task") {
                        blackDashboard.showSidebarMessage(msg)
                        return location.href = '/archive';
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function deletearticle(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }

    swal({
        title: "Delete This Article?",
        text: "We'll Delete the task and you'll lose it forever!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var comment = $('.swal-content__textarea').val()

            $.ajax({
                type: "POST",
                url: url,
                data: { 'delete': 'delete'},
                success: function (msg) {
                    if (msg == "You've Deleted The Task") {
                        blackDashboard.showSidebarMessage(msg)
                        return location.href = '/project';
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function commentarticle() {
    var href = $('.htref').val()
    $.ajax({
        type: "POST",
        url: href,
        data: { 'requestedit': 'requestedit' },
        success: function (msg) {
            if (msg == "You have submitted some comments") {
                blackDashboard.showSidebarMessage(msg)
                return location.href = '/';
            }
            blackDashboard.showDangerMessage(msg)
        }
    })
}

function resolvearticle() {
    var href = $('.taskslug').val()
    $.ajax({
        type: "POST",
        url: '/message/' + href,
        data: { 'resolve': 'resolve' },
        success: function (msg) {
            if (msg == "Comments Resolved") {
                blackDashboard.showSidebarMessage(msg)
                return location.href = '/task/' + href;
            }
            blackDashboard.showDangerMessage(msg)
        }
    })
}

function deletecomment(id, event) {
    var href = $('.taskslug').val()
    $.ajax({
        type: "POST",
        url: '/message/' + id,
        data: { 'deletecomment': 'deletecomment' },
        success: function (msg) {
            if (msg == "Comments Deleted") {
                blackDashboard.showSidebarMessage(msg)
                return getedits()
            }
            blackDashboard.showDangerMessage(msg)
        }
    })
}

function restorearticle(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }
    swal({
        title: "Restore This Article?",
        text: "Once restored, you can buy the article again!",
        icon: "success",
        buttons: true,
        dangerMode: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { 'restore': 'restore' },
                    success: function (msg) {
                        if (msg == "You've Restored This Task") {
                            blackDashboard.showSidebarMessage(msg)
                            return location.href = '/';
                        }
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
}

function deletearticle(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }
    swal({
        title: "Delete This Article?",
        text: "Once deleted, you cannot recover the article again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { 'delete': 'delete' },
                    success: function (msg) {
                        if (msg == "You've Deleted This Task") {
                            blackDashboard.showSidebarMessage(msg)
                            return location.href = '/';
                        }
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
}

function deleteproject(url = null) {
    if (url == null) {
        var url = $('.htref').attr('value')
    } else {
        var url = url
    }
    swal({
        title: "Delete This Project?",
        text: "If You Delete This Project You Delete the Tasks Inside!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { 'delete': 'delete' },
                    success: function (msg) {
                        if (msg == "You've Deleted This Project") {
                            blackDashboard.showSidebarMessage(msg)
                            return location.href = '/project';
                        }
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
}

function assignarticle(url, title) {
    $('#assignModal').modal()
    $('#assignModal').removeClass('d-none')
    console.log(title)
    console.log(url)
    $('.tasktitle').val(title)
    $('.taskurl').val(url)
}

function billclient(username) {
    if (username) {
        $('#contactModal').modal()
        $('#emailreceiver').val(username)
    }
}

function approveuser(url) {
    const container = document.createElement("div");

    var textarea = document.createElement('textarea')
    textarea.rows = 6
    textarea.className = 'swal-content__textarea'
    textarea.placeholder = 'Any comments?'

    let wrap = document.createElement('div');
    wrap.setAttribute('class', 'text-muted');
    wrap.innerHTML = "<div class='rating-stars text-center'><ul id='stars'><li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li><li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li> <li class='star' title='Good' data-value='3'> <i class='fa fa-star fa-fw'></i></li><li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li><li class='star'title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i> </li> </ul></div>"

    var scr       = document.createElement("script");
    scr.type      = "text/javascript";
    scr.innerHTML = "ratingcss()";

    // You could also use container.innerHTML to set the content.
    container.append(wrap);
    container.append(scr)
    container.append(textarea);

    swal({
        content: container,
        title: "Approve This Writer?",
        text: "Once approved, the writer will get access to the CMS!",
        icon: "success",
        buttons: true,
        dangerMode: false,
    })
        .then((willDelete) => {
            rating  = parseInt($('#stars li.selected').last().data('value'), 10)
            comment = $('.swal-content__textarea').val()

            if(rating === null || rating === ''){
                rating = null
            }

            if(comment === null || comment === ''){
                comment = null
            }

            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { 'approve': 'approve', 'comments': comment, 'rating': rating},
                    success: function (msg) {
                        if (msg == "You've Approved This User") {
                            blackDashboard.showSidebarMessage(msg)
                            return $('.userlit').load('/user .userlit > *')
                        }
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
}

function rejectuser(url) {
    const container = document.createElement("div");

    var textarea = document.createElement('textarea')
    textarea.rows = 6
    textarea.className = 'swal-content__textarea'
    textarea.placeholder = 'Any comments?'

    let wrap = document.createElement('div');
    wrap.setAttribute('class', 'text-muted');
    wrap.innerHTML = "<div class='rating-stars text-center'><ul id='stars'><li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li><li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li> <li class='star' title='Good' data-value='3'> <i class='fa fa-star fa-fw'></i></li><li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li><li class='star'title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i> </li> </ul></div>"

    var scr       = document.createElement("script");
    scr.type      = "text/javascript";
    scr.innerHTML = "ratingcss()";

    // You could also use container.innerHTML to set the content.
    container.append(wrap);
    container.append(scr)
    container.append(textarea);

    swal({
        content: container,
        title: "Reject User Application?",
        text: "Once rejected, the user will not have access to CMS!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            rating  = parseInt($('#stars li.selected').last().data('value'), 10)
            comment = $('.swal-content__textarea').val()

            if(rating === null || rating === ''){
                rating = null
            }

            if(comment === null || comment === ''){
                comment = null
            }
            
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { 'reject': 'reject' },
                    success: function (msg) {
                        if (msg == "You've Rejected This User") {
                            blackDashboard.showSidebarMessage(msg)
                            return $('.userlit').load('/user .userlit > *')
                        }
                        blackDashboard.showDangerMessage(msg)
                    }
                })
            }
        })
}

function reviewuser(url) {
    swal({
        title: "Put User Account in Review?",
        text: "Once in review, the user will not be able to pick tasks on the CMS!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'inreview': 'inreview' },
                success: function (msg) {
                    if (msg == "You've put this Author In Review") {
                        blackDashboard.showSidebarMessage(msg)
                        return $('.userlit').load('/user .userlit > *')
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function deleteuser(url) {
    swal({
        title: "Delete User Account From Catalog?",
        text: "Once deleted, the user will be evicted from Copy Scribers for Good!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'deleted': 'deleted' },
                success: function (msg) {
                    if (msg == "You've put this Author In Review") {
                        blackDashboard.showSidebarMessage(msg)
                        return $('.userlit').load('/user .userlit > *')
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function blockuser(url) {
    swal({
        title: "Block User Account Permanently?",
        text: "Once blocked, the user will not be able to pick tasks your tasks!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'block': 'block' },
                success: function (msg) {
                    if (msg == "You've put this Author In Review") {
                        blackDashboard.showSidebarMessage(msg)
                        return $('.userlit').load('/user .userlit > *')
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function blockclient(url) {
    swal({
        title: "Block User From Your Catalog?",
        text: "Beware, this might result in deleting your account from Copy Scribers",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'blockclient': 'blockclient' },
                success: function (msg) {
                    if (msg == "You've put this Author In Review") {
                        blackDashboard.showSidebarMessage(msg)
                        return $('.userlit').load('/user .userlit > *')
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function deletemyaccount(url) {
    swal({
        title: "Delete Your Account From Copy Scribers?",
        text: "Beware, this might result in deleting your tasks from Copy Scribers",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: url,
                data: { 'deletemyaccount': 'deletemyaccount' },
                success: function (msg) {
                    if (msg == "You've put this Author In Review") {
                        blackDashboard.showSidebarMessage(msg)
                        return $('.userlit').load('/user .userlit > *')
                    }
                    blackDashboard.showDangerMessage(msg)
                }
            })
        }
    })
}

function sendanemail() {
    var emaildata = $('#send-email').serializeArray()
    receiver      = $('#emailreceiver').val()
    $.ajax({
        type: "POST",
        url: "/user",
        data: $.param(emaildata),
        success: function (msg) {
            if (msg === 'Email Sent') {
                $('#send-email').trigger('reset')
                blackDashboard.showSidebarMessage(msg)
                return location.href    =   '/user/'+receiver
            }
            blackDashboard.showDangerMessage(msg)
        }
    })
}

function assigntasknproject() {
    var userntaskdata = $('#assigntask').serializeArray()
    var href = $('.taskurl').val()
    $.ajax({
        type: "POST",
        url: href,
        data: $.param(userntaskdata),
        success: function (msg) {
            blackDashboard.showSidebarMessage(msg)
            return location.href = href
        }
    })
}

function ratingcss(){
    $(document).ready(function(){
  
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
        
            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
            });
            
        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
            });
        });
        
        
        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            
            for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
            }
            
            for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
            }
            
            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            return ratingValue            
        });
    });


    
}
  
function responseMessage(msg) {
    $('.success-box').fadeIn(200);  
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

