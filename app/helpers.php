<?php
# helpers function


function activeMenu($path)
{
    $currentPath = parse_url(url()->current(), PHP_URL_PATH);
    return strstr($currentPath, $path) ? "active" : "";
}


function greetText()
{
    return date('H') >= 6 && date('H') < 18 ? "Good Morning" : "Good Evening";
}

function roles()
{
    return ['admin', 'manager', 'operator', 'service'];
}
