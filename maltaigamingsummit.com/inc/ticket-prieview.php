<script>
    
       
  
var mouse_is_inside = false;
$(document).ready(function(){
    
    $('.preview').click(function(){
        $('#preview').show();
    });
    $('#preview').hover(function(){ 
            mouse_is_inside=true; 
        }, function(){ 
            mouse_is_inside=false; 
        });
       

    $("body").mouseup(function(){ 
            if(! mouse_is_inside) $('#preview').hide();
        });
        

    });
</script>
<div class="grey-box">
    <h3 class="icon-can" style="padding: 4px 0 0 80px">Your Ticket</h3>
    <p style="padding-left: 1px; text-align: center"><img style="cursor: pointer;" class="preview" src="images/ticket-small.png"/></p>
    <p class="preview" style="text-align: center; text-decoration: underline; cursor: pointer;">Preview</p>
</div>
<div id="preview" style="display: none;">
    <img src="images/ticket-large.png"/>
</div>