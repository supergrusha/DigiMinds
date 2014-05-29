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
        <?php foreach ($users as $user): ?>
        <tr id="<?php echo $user->users_id; ?>" class="edit_tr">
                <td class="edit_td">
                    <input type="text" value="<?php echo $user->users_username; ?>" class="editbox" id="username_input_<?php echo $user->users_id; ?>" />
                </td>
                <td class="edit_td">
                    <input type="text" value="<?php echo $user->users_name; ?>" class="editbox" id="name_input_<?php echo $user->users_id; ?>" />
                </td>
                <td class="edit_td">
                    <input type="text" value="<?php echo $user->users_email; ?>" class="editbox" id="email_input_<?php echo $user->users_id; ?>" />
                </td>
                <td class="noedit">
                    <span id="userType_<?php echo $user->users_id; ?>" class="text"><?php echo $user->userType_name; ?></span>
                </td>
                <td><a href="resetPass.php?id=<?php echo $user->users_id; ?>">Reset User Password</a></td>
                <td class="noedit"><a href="users/delete_user/<?php echo $user->users_id;?>" class="delete"><div id="delete">Delete</div></a></td>

            </tr>
        <?php endforeach; ?>
    </tbody> 

</table>