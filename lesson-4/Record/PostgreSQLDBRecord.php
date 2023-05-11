<?php
class PostgreSQLDBRecord implements DBRecord{
    public function recordDB(): string{
        return "PostgreSQL has been recorded";
    }
}