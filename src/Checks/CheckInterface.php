<?php

namespace EnvChecker\Checks;

use EnvChecker\Result\CheckResult;

interface CheckInterface
{
    public function run(): CheckResult;
}
