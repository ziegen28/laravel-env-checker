<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

class EnvironmentCheck implements CheckInterface
{
    public function run(): CheckResult
    {
        return version_compare(PHP_VERSION, '8.1', '>=')
            ? new CheckResult('Environment', 'OK', 'PHP version is compatible')
            : new CheckResult('Environment', 'FAIL', 'PHP < 8.1', [
                'Upgrade PHP to >= 8.1'
            ]);
    }
}
