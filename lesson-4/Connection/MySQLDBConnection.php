<?php
class MySQLDBConnection implements DBconnection
{
    public function connectDB():string{
        return "MySQL has been connected";
    }
}