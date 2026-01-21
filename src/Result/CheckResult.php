<?php

namespace EnvChecker\Result;

class CheckResult
{
    public function __construct(
        public string $name,
        public string $status, // OK | WARN | FAIL
        public string $message,
        public array $fixes = []
    ) {}
}
