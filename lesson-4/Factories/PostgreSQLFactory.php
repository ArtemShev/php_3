<?php
class PostgreSQLFactory extends AbstractFactory
{
    public function createDBConnnection(): DBconnection
    {
        return new PostgreSQLDBConnection();
    }
    public function createDBRecord(): DBRecord
    {
        return new PostgreSQLDBRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuiler
    {
        return new PostgreSQLDBQueryBuiler();
    }
}
