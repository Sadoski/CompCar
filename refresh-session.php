<?php
class RefreshSession {
    public Function refreshSession($id, $login,$email){
        session_start();
    $_SESSION['id_usuario'] = $id;
    $_SESSION['login'] = $login;
    $_SESSION['email'] = $email;
    }
}