<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

class DockerPermissionCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        if (!file_exists('/.dockerenv')) {
            return new CheckResult('Docker Permissions', 'OK', 'Not running in Docker');
        }

        if (!is_writable(storage_path('framework'))) {
            return new CheckResult(
                'Docker Permissions',
                'FAIL',
                'Storage not writable inside Docker',
                [
                    'docker-compose exec app chown -R www-data:www-data storage bootstrap/cache',
                    'docker-compose exec app chmod -R 775 storage bootstrap/cache'
                ]
            );
        }

        return new CheckResult('Docker Permissions', 'OK', 'Writable inside Docker');
    }
}
