<?php
if(isset($_SESSION['login_user'])){
    session_destroy();
    header('Location: ../index.html')

}
