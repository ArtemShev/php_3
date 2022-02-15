<?php
class PostgreSQLDBQueryBuiler implements DBQueryBuilder
{
    public function buildQueryDB() : string
    {
        return " PostgreSQL query has been builded";
    }
}