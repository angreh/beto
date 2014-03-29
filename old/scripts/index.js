$(document).ready(function(){	
    //$('#footer_div').css('top','40px');
    });
    
function loadMenu(url){
    if(url != ''){
        $.ajax({
            url: '/contents/'+ url +'.html',
            success: function(data) {
                $('#content_div').hide(0);
                $('#contentBack_div').hide(0);

                $('#content_div').html(data);
                var inter = setTimeout(function(){
        
                    var hei = $('#content_div').height();
                    $('#contentBack_div').height(hei+40);
                    
                    $('#contentBack_div').slideDown(500);
                    $('#content_div').slideDown(900);
                    
                    var limitH = 650;
                    
                    if(hei > limitH){
                        var variationHeight = hei - limitH;
                        $('#footer_div').css('top',821 + variationHeight + 'px');
                    } else {
                        $('#footer_div').css('top','821px');
                    }
                },100);
            }
        });
    } else {
        $('#content_div').slideUp(500);
        $('#contentBack_div').slideUp(500);
        $('#footer_div').animate({
            'top': '821px'
        });
    }
    return false;
}
