<?php
//session_start();

class Reporter
{
    public static int $PURCHASE_SUCCEEDED = 0;
    public static int $PURCHASE_FIELD = 1;
    public static int $ACCOUNT_EXISTS = 2;
    public static int $INCORRECT_PASSWORD = 3;

    // this var is used with the case that user trying to log with  unexisted account
    public static int $NO_ACCOUNT_FOUND = 4;

    // this var is elated to user not logged in
    public static int $NO_CONNECTED_USER = 5;

    static function setReport(int $report):void
    {
        $_SESSION['report'] = $report;
    }

    static function getReport(): mixed
    {
        return $_SESSION['report'] ?? null;
    }

    static function dropReport(): void
    {
        unset($_SESSION['report']);
    }

}