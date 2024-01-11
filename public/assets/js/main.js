$('.invoice').click(function() {
    if ($('.funds').hasClass('d-none')) {
        $('.funds').removeClass('d-none')
    } else {
        $('.funds').addClass('d-none')
    }
})

(function() {
    var hasTimer = false;
    // Init timer start
    $('.start-timer-btn').on('click', function() {
        hasTimer = true;
        $('.timer').timer({
            editable: true
        });
        $(this).addClass('d-none');
        $('.pause-timer-btn, .remove-timer-btn').removeClass('d-none');
    });

    // Init timer resume
    $('.resume-timer-btn').on('click', function() {
        $('.timer').timer('resume');
        $(this).addClass('d-none');
        $('.pause-timer-btn, .remove-timer-btn').removeClass('d-none');
    });


    // Init timer pause
    $('.pause-timer-btn').on('click', function() {
        $('.timer').timer('pause');
        $(this).addClass('d-none');
        $('.resume-timer-btn').removeClass('d-none');
    });

    // Remove timer
    $('.remove-timer-btn').on('click', function() {
        hasTimer = false;
        $('.timer').timer('remove');
        $(this).addClass('d-none');
        $('.start-timer-btn').removeClass('d-none');
        $('.pause-timer-btn, .resume-timer-btn').addClass('d-none');
    });

    // Additional focus event for this demo
    $('.timer').on('focus', function() {
        if (hasTimer) {
            $('.pause-timer-btn').addClass('d-none');
            $('.resume-timer-btn').removeClass('d-none');
        }
    });

    // Additional blur event for this demo
    $('.timer').on('blur', function() {
        if (hasTimer) {
            $('.pause-timer-btn').removeClass('d-none');
            $('.resume-timer-btn').addClass('d-none');
        }
    });
})();

$('.page-item').click(function(event) {

    var valued = $(this).children().html()

    if ($(this).hasClass('active')) {
        return false
    }

    if (valued === 'Next') {
        if ($(this).hasClass('disabled')) {
            return false
        }

        var pag = $('.page-item.active').children().html()

        var active = parseInt(pag) + 1

        var page = pag * 40

        if ($('.page-item.active').next().children().html() !== 'Next') {
            $('.page-item').removeClass('active')
            $(".page-item").filter(function() {
                var text = $(this).text();
                return text == active
            }).addClass("active");
        }

    } else if (valued === 'Previous') {
        if ($(this).hasClass('disabled')) {
            return false
        }

        var number = $('.page-item.active').children().html()

        var active = parseInt(number) - 1

        var pag = ($('.page-item.active').children().html() - 2)

        var page = pag * 40

        if ($('.page-item.active').prev().children().html() !== 'Previous') {
            $('.page-item').removeClass('active')
            $(".page-item").filter(function() {
                var text = $(this).text();
                return text == active
            }).addClass("active");
        }

    } else {
        var page = ($(this).attr('val') - 1) * 40;
        $('.page-item').removeClass('active')
        $(this).addClass('active')
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {
            'paginate': 'paginate',
            'page_number': page
        },
        success: function(msg) {
            $('.listpaginate').html(msg)
        }
    })

    if ($('.page-item.active').next().children().html() === 'Next') {
        $('.page-item').last().addClass('disabled')
    } else {
        $('.page-item').last().removeClass('disabled')
    }

    if ($('.page-item.active').prev().children().html() === 'Previous') {
        $('.page-item').first().addClass('disabled')
    } else {
        $('.page-item').first().removeClass('disabled')
    }

})

function recruitdescription(id, next) {
    event.preventDefault()
    let formcontent = $('#' + id).serializeArray()
    let destination = url
    console.log(formcontent)
    $.ajax({
        type: 'POST',
        url: destination,
        data: formcontent,
        success: function(msg) {
            if (msg === "We've Created the test article") {
                $('.test-articled').load('/recruit .test-articled > *')
                return blackDashboard.showSidebarMessage(msg)
            }
        }
    })
}