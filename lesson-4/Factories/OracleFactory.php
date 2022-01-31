<?php
class OracleFactory extends AbstractFactory
{
    public function createDBConnnection(): DBconnection
    {
        return new OracleDBConnnection();
    }
    public function createDBRecord(): DBRecord
    {
        return new OracleDBRecord();
    }
    public function createDBQueryBuiler(): DBQueryBuiler
    {
        return new OracleDBQueryBuiler();
    }
}