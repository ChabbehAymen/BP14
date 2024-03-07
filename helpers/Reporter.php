<?php
//session_start();

class Reporter
{
    public static int $PURCHASE_SUCCEEDED = 0;
    public static int $PURCHASE_FIELD = 1;

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