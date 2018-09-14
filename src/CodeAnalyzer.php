<?php

namespace RTsachev\CodeAnalyzer;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CodeAnalyzer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:analyze';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Static code analysis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->makeReportDirectories();
        $commands = config('code_analyzer.commands');
        foreach ($commands as $command) {

            $process = new Process($command);
            $process->run();

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            echo $process->getOutput();
        }

        $this->info('Code analyzed!');
    }

    private function makeReportDirectories()
    {
        $reportsDirPath = base_path(config('code_analyzer.reports_path'));
        $this->makeDir($reportsDirPath);
        $subdirs = config('code_analyzer.subdirs');
        foreach ($subdirs as $subdir) {
            $subdirPath = $reportsDirPath . DIRECTORY_SEPARATOR . $subdir;
            $this->makeDir($subdirPath);
        }
    }

    private function makeDir($path)
    {
        File::isDirectory($path) || File::makeDirectory($path);
    }
}
