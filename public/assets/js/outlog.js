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

$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('d-none'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', { 'class': 'select-options' }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
        if ($this.children('option').eq(i).is(':selected')){
          $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
        }

        if ($this.children('option').eq(i).is(':disabled')){
            $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('d-none')
        }
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.find('li.is-selected').removeClass('is-selected');
        $list.find('li[rel="' + $(this).attr('rel') + '"]').addClass('is-selected');
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});