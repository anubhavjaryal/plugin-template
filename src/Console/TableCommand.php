<?php

namespace Ism\Template\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Filesystem\Filesystem;

class TableCommand extends Command {
    protected $name = 'template:table';
    protected $description = 'Create a migration for the template-map database table';
    protected $files;
    protected $composer;
    public function __construct(Filesystem $files, Composer $composer) {
        parent::__construct();
        $this->files = $files;
        $this->composer = $composer;
    }

    public function fire() {
        $table = 'template_map';
        $tableClassName = Str::studly($table);
        $fullPath = $this->createBaseMigration($table);
        $stub = str_replace(
            ['{{table}}', '{{tableClassName}}'], [$table, $tableClassName], $this->files->get(__DIR__.'/stubs/template-map.stub')
        );
        $this->files->put($fullPath, $stub);
        $this->info('Migration created successfully!');
        $this->composer->dumpAutoloads();
    }
    protected function createBaseMigration($table = 'template_map'){
        $name = 'create_'.$table.'_table';
        $path = $this->laravel->databasePath().'/migrations';
        return $this->laravel['migration.creator']->create($name, $path);
    }
}
