<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

class ExecutionContextCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        if (file_exists('/.dockerenv')) {
            return new CheckResult('Execution Context', 'OK', 'Correct execution context');
        }

        if (file_exists(base_path('docker-compose.yml'))) {
            return new CheckResult(
                'Execution Context',
                'FAIL',
                'Artisan executed on host while Laravel runs in Docker',
                ['docker-compose exec app php artisan <command>']
            );
        }

        return new CheckResult('Execution Context', 'OK', 'Local execution');
    }
}
