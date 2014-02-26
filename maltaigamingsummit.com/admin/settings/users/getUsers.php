
<table cellpadding="0" cellspacing="0" border="0" class="display" id="users">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Name & Surname</th>
                            <th>E-mail</th>
                            <th>User Type</th>
                            <th>Reset Pass</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
require ('../../../classes/DB.php');
    $db = new DB();
$result = $db->query("SELECT * FROM users INNER JOIN userType WHERE users.userType_id=userType.userType_id ORDER BY users.userType_id");
while ($row = $db->fetchData($result)) {
    $id = $row['users_id'];
    $username = $row['users_username'];
    $name = $row['users_name'];
    $email = $row['users_email'];
    $userType = $row['userType_name'];
    ?>
    <tr id="<?= $id; ?>" class="edit_tr">
        <td class="edit_td">
            <span id="username_<?php echo $id; ?>" class="text"><?php echo $username; ?></span>
            <input type="text" value="<?php echo $username; ?>" class="editbox" id="username_input_<?php echo $id; ?>" />
        </td>
        <td class="edit_td">
            <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
            <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>" />
        </td>
        <td class="edit_td">
            <span id="email_<?php echo $id; ?>" class="text"><?php echo $email; ?></span>
            <input type="text" value="<?php echo $email; ?>" class="editbox" id="email_input_<?php echo $id; ?>" />
        </td>
        <td class="noedit">
            <span id="userType_<?php echo $id; ?>" class="text"><?php echo $userType; ?></span>
        </td>
        <td><a href="resetPass.php?id=<?=$id;?>">Reset User Password</a></td>
        <td class="noedit"><a href="#" class="delete"><div id="delete"></div></a></td>

    </tr>
    <?
}
?>
                    </tbody> 

                </table>

<script type="text/javascript"  src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript">	
                /* Add a click handler to the rows - this could be used as a callback */
                $('#users').dataTable();
                $('#users td a.delete').click(function(){
                                 
                    if (confirm("Are you sure you want to delete this row?"))
                    {
                        var id = $(this).parent().parent().attr('id');
                        var data = 'id=' + id ;
                        var parent = $(this).parent().parent();
                                        
                        $.ajax(
                        {
                            type: "POST",
                            url: "deleteUser.php",
                            data: data,
                            cache: false,

                            success: function()
                            {
                                parent.fadeOut('slow', function() {$(this).remove();});
                            }
                        });			
                    }
                });
                
                $(".edit_tr").click(function()
                {
                    var ID=$(this).attr('id');
                    $("#username_"+ID).hide();
                    $("#name_"+ID).hide();
                    $("#email_"+ID).hide();
                    $("#username_input_"+ID).show();
                    $("#name_input_"+ID).show();
                    $("#email_input_"+ID).show();
                }).change(function()
                {
                    var ID=$(this).attr('id');
                    
                    var username=$("#username_input_"+ID).val();
                    var name=$("#name_input_"+ID).val();
                    var email=$("#email_input_"+ID).val();
                    var dataString = 'id='+ ID +'&username='+username+'&name='+name+'&email='+email;
                    $("#username_"+ID).html('<img src="../../images/load.gif" />'); // Loading image

                    if(username.length>0&& name.length>0 )
                    {

                        $.ajax({
                            type: "POST",
                            url: "editUser.php",
                            data: dataString,
                            cache: false,
                            success: function(html)
                            {
                                $("#username_"+ID).html(username);
                                $("#name_"+ID).html(name);
                                $("#email_"+ID).html(email);
                            }
                        });
                    }
                    else
                    {
                        alert('Enter something.');
                    }

                });
                 // Edit input box click action
                $(".editbox").mouseup(function() 
                {
                    return false
                });

                // Outside click action
                $(document).mouseup(function()
                {
                    $(".editbox").hide();
                    $(".text").show();
                });
                function check_username_availability(){

                    var username = $("#username").val();
                    if(username.length > 2){
                        $('.load').show();
                        $.post("check_username_availablity.php", {
                            username: $('#username').val(),
                        }, function(response){
                            $('#Info').fadeOut();
                            $('.load').hide();
                            setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
                        });
                        return false;
                    }
                }
            

                
                $("#addItem").click(function(){
                    $(".add").show();
                    $('#addUser').click(function(){
                        if (confirm("Are you sure you want to add this item?"))
                        {
                            var name=$("#name").val();
                            var username=$("#username").val();
                            var email=$("#email").val();
                            var pass=$("#pass").val();
                            var dataString = 'pass='+ pass +'&username='+username+'&name='+name+'&email='+email;
                            $("#username").html('<img src="../../images/load.gif" />'); // Loading image
                             if(username.length>0&& name.length>0 )
                    {

                            $.ajax(
                            {
                                type: "POST",
                                url: "addUser.php",
                                data: dataString,
                                cache: false,

                                success: function()
                                {
                                    $(".add").hide();
                                    $('#usersData').load( 'getUsers.php' );
                                    
                                }
                            });	
                    }
                        }
                        else
                        {
                            alert('Something went wrong');
                        }
                        $('.add').mouseleave(function(){
                            $(this).hide();
                        });
                    });     
                });
</script>