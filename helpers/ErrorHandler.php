<?php
session_start();

class ErrorHandler
{
//    private Array $errors;
    public static int $UNDEFINED_ERROR=0;
    public static int $INVALID_DATA = 1;

    static function setError(int $error):void
    {
        $_SESSION['error'] = $error;
    }

    static function getError(): int
    {
        return $_SESSION['error'];
    }

    static function unsetErrors(): void
    {
        unset($_SESSION['error']);
    }
}