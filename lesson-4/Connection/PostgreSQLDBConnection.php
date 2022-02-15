<?php
class PostgreSQLDBConnection implements DBconnection
{
    public function connectDB():string{
        return "PostgreSQL has been connected";
    }
}