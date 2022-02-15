<?php
abstract class AbstractFactory
{
    abstract public function createDBConnnection(): DBconnection;
    abstract public function createDBRecord(): DBRecord;
    abstract public function createDBQueryBuiler(): DBQueryBuilder;
}

