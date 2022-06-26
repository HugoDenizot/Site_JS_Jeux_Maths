<?php


class myDB extends SQLite3
{
    function __construct()
    {
        $this->open('../html/highscore2.db');
    }
}