<?php
class MySQLDBRecord implements DBRecord{
    public function recordDB(): string{
        return "MySQL has been recorded";
    }
}