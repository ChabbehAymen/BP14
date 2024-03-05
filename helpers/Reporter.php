<?php

namespace helpers;
session_start();

class Reporter
{
    public static int $PURCHASE_SUCCEEDED = 0;

    static function setReport(int $report):void
    {
        $_SESSION['report'] = $report;
    }

    static function getReport()
    {
        return $_SESSION['report'];

    }

}