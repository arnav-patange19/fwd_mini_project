<?php
//improve safety
ini_set('session.use_only_cookies',1);
ini_set('session.use_only_strict_mode',1);

session_set_cookie_params([
    'lifetime' =>1800,
    'domain' =>'localhost',
    'path' => '/',
    'secure'  =>true,
    'httponly' =>true
]);

session_start();

//regenerate session id in very 30 mins gap
if (!isset($_SESSION["last_regeneration"])){
    regenerate_session_id();
}else{
    $interval = 60*30;
    if(time() - $_SESSION["last_regeneration"] >= $interval ){
        regenerate_session_id();
        /*
        This creates a new session ID for the current session.

        By default, it keeps all your existing session variables intact.

        The main purpose is security (to prevent session fixation attacks), not to destroy data.
        */
    }
}

function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION["last_regeneration"]= time();
}