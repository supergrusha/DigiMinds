<ul>
    <a href="http://admin.maltaigamingsummit.com/settings/account/index.php">
        <li>
            <img src="http://admin.maltaigamingsummit.com/images/admin-icon.png">
            Account Settings
        </li>
    </a>
    <?
        if (isset($_SESSION['superAdmin'])){
    ?>
    <a href="http://admin.maltaigamingsummit.com/settings/users/index.php">
          <li>
            <img src="http://admin.maltaigamingsummit.com/images/settings-icon.png">
            User Settings
        </li>
    </a>
    <?}?>
    <a href="http://admin.maltaigamingsummit.com/settings/index.php">
        <li>                        
            <img src="http://admin.maltaigamingsummit.com/images/dashboard-icon.png">
            Company Settings
        </li>
    </a>
    <a href="http://analytics.google.com" target="_blank">
        <li>
            <img src="http://admin.maltaigamingsummit.com/images/ga-icon.png">
            Google Analytics
        </li>
    </a>
</ul>