<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

class PermissionCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        foreach (['storage', 'bootstrap/cache'] as $dir) {
            if (!is_writable($dir)) {
                return new CheckResult(
                    'Permissions',
                    'FAIL',
                    "$dir is not writable",
                    [
                        'chmod -R 775 storage bootstrap/cache',
                        'chown -R www-data:www-data storage bootstrap/cache'
                    ]
                );
            }
        }

        return new CheckResult('Permissions', 'OK', 'Directories writable');
    }
}
