<?php
    session_start();

    session_unset();

    session_destroy();

    header('Location: /PAJILLAS_TORO');
?>