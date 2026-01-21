<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;
use Illuminate\Support\Facades\DB;

class DatabaseCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        try {
            DB::connection()->getPdo();
            return new CheckResult('Database', 'OK', 'Database connected');
        } catch (\Throwable) {
            return new CheckResult(
                'Database',
                'FAIL',
                'Database connection failed',
                ['Check DB_HOST, DB_PORT, Docker service name']
            );
        }
    }
}
