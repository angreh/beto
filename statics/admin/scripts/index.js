window.grehInit = '';
function Angreh() {
    this.resetBG = function() {
//        $('.m_buttons').each(function(i, elem) {
//            $(elem).mouseleave();
//        });
    };
    this.onLoadPage = function() {
        var currentLocation = location.hash;
        if (currentLocation.length < 2 || currentLocation == '#home' || currentLocation == '#home/') {
            currentLocation = '#home/home';
        }
        currentLocation = currentLocation.substr(1);
//        alert(currentLocation);
        $('#innertube').load('/admin/' + currentLocation, function() {
            $('form').each(function() {
                Mascaras.carregar();
                $(this).submit(function(e) {
                    var postData = $(this).serialize();
                    var formURL = $(this).attr("action");
                    $.ajax(
                            {
                                url: formURL,
                                type: "POST",
                                data: postData,
                                success: function(data, textStatus, jqXHR)
                                {
                                    $('#innertube').html(data);
                                },
                                error: function(jqXHR, textStatus, errorThrown)
                                {
                                    //if fails      
                                }
                            });
                    e.preventDefault(); //STOP default action
                    e.unbind(); //unbind. to stop multiple form submit.
                });
            });
        });
    };
    this.ativeButton = function(button) {
//        if (typeof button === 'undefined') {
//            return window.buttonActive;
//        } else {
//            window.buttonActive = button;
//            return this;
//        }
    };
}

var _Angreh = function() {
    window.grehInit = new Angreh();
    return window.grehInit;
};
var Greh = _Angreh;

$(document).ready(function() {
    $('.menuItem').each(function() {
        $(this).click(function() {
            window.location.hash = $(this).attr('page');
        });
    });
    $(window).hashchange(function() {
        Greh().onLoadPage();
    });
    $(window).hashchange();
});

