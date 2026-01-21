<?php

namespace EnvChecker\Commands;

use Illuminate\Console\Command;
use EnvChecker\Checks;
use EnvChecker\Output\ConsoleReporter;

class EnvCheckCommand extends Command
{
    protected $signature = 'env:check {scope? : docker|permissions|database|environment}';
    protected $description = 'Diagnose Laravel environment, Docker, permission, and execution issues';

    public function handle(): int
    {
        $scope = $this->argument('scope');

        $checks = match ($scope) {
            'docker' => [
                new Checks\DockerCheck(),
                new Checks\ExecutionContextCheck(),
                new Checks\DockerPermissionCheck(),
            ],

            'permissions' => [
                new Checks\PermissionCheck(),
                new Checks\DockerPermissionCheck(),
            ],

            'database' => [
                new Checks\DatabaseCheck(),
            ],

            'environment' => [
                new Checks\EnvironmentCheck(),
            ],

            null => [
                new Checks\EnvironmentCheck(),
                new Checks\DockerCheck(),
                new Checks\ExecutionContextCheck(),
                new Checks\PermissionCheck(),
                new Checks\DockerPermissionCheck(),
                new Checks\DatabaseCheck(),
            ],

            default => $this->invalidScope($scope)
        };

        foreach ($checks as $check) {
            $result = $check->run();
            ConsoleReporter::print($this, $result);

            if ($result->status === 'FAIL' && $result->name === 'Execution Context') {
                $this->error("\nBlocked to prevent damage.\n");
                return Command::FAILURE;
            }
        }

        $this->info("\n✔ Environment check completed\n");
        return Command::SUCCESS;
    }

    private function invalidScope(string $scope): array
    {
        $this->error("Unknown scope: {$scope}");
        $this->line("Available scopes: docker, permissions, database, environment");
        exit(Command::FAILURE);
    }
}
