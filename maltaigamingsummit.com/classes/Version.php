<?php

class Version {

    function autoVer($url) {

        $path = pathinfo($url);
        $ver = filemtime($_SERVER['DOCUMENT_ROOT'] . '/ClubSite/' . $url);
        echo $path['dirname'] . '/' . $path['basename'] . '?v=' . $ver;
    }

}

?>