
function check_email_availability(){
     var email = $("#email").val();
                    if(email.length > 2){
                        $('#email').fadeOut();
                        $('.load').show();
                        $.post("../../inc/check_email_availablity.php", {
                            email: $('#email').val()
                        }, function(response){
                            $('.load').hide();
                            $('#email').fadeIn();
                            $('#message').empty().append(response);                    
                        });
                        return false;
                    }
                }
                var mouse_is_inside = false;
$(document).ready(function(){
    
        $('.add').hover(function(){ 
            mouse_is_inside=true; 
        }, function(){ 
            mouse_is_inside=false; 
        });

        $("body").mouseup(function(){ 
            if(! mouse_is_inside) $('.add').hide();
        });
        

    });

