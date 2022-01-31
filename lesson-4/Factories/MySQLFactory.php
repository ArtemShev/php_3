<?php
// include 'AbstractFactory.php';
class MySQLFactory extends AbstractFactory
{
    public function createDBConnnection(): DBconnection
    {
        return new MySQLDBConnection();
    }
    public function createDBRecord(): DBRecord
    {
        return new MySQLDBRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuilder
    {
        return new MySQLDBQueryBuilder();
    }
}
