<?php
function clientCode(AbstractFactory $factory){
    $DBConnection = $factory->createDBConnnection();
    $DBRecord = $factory->createDBRecord();
    $DBQueryBuilder = $factory->createDBQueryBuiler();
    echo $DBConnection->connectDB()."\n";
    echo $DBRecord->recordDB()."\n";
    echo $DBQueryBuilder->buildQueryDB()."\n";
}

echo "MySql:\n";
clientCode(new MySQLFactory());

echo "PostgreSql:\n";
clientCode(new PostgreSQLFactory());

echo "Oracle:\n";
clientCode(new OracleFactory());