<?php
class Logout
{
    public function __construct()
    {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function execute()
    {
        // Destroy the session
        session_unset();
        session_destroy();

        header("Location: ../index.php");
        exit();
    }
}

$logout = new Logout();
$logout->execute();
?>