<?php


abstract class DbModel
{

    abstract static function createFromDbResult($dbResult);
}