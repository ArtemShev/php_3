<?php
class OracleDBConnnection implements DBconnection
{
    public function connectDB():string{
        return "Oracle has been connected";
    }
}