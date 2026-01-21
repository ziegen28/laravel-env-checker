<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

class DockerCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        if (file_exists('/.dockerenv')) {
            return new CheckResult('Docker', 'OK', 'Running inside Docker');
        }

        if (file_exists(base_path('docker-compose.yml'))) {
            return new CheckResult(
                'Docker',
                'WARN',
                'Docker detected but Artisan running on host',
                ['docker-compose exec app php artisan env:check']
            );
        }

        return new CheckResult('Docker', 'OK', 'Docker not detected');
    }
}
