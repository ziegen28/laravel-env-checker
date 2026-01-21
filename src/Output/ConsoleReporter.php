<?php

namespace EnvChecker\Output;

use Illuminate\Console\Command;
use EnvChecker\Result\CheckResult;

class ConsoleReporter
{
    public static function print(Command $cmd, CheckResult $r): void
    {
        $icon = ['OK'=>'✔','WARN'=>'⚠','FAIL'=>'✖'][$r->status];
        $cmd->line("[ $icon ] {$r->name} — {$r->message}");

        foreach ($r->fixes as $fix) {
            $cmd->line("    → $fix");
        }
    }
}
