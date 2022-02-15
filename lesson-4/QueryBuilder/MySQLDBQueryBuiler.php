<?php
class MySQLDBQueryBuilder implements DBQueryBuilder
{
    public function buildQueryDB() : string
    {
        return " MySQL query has been builded";
    }
}