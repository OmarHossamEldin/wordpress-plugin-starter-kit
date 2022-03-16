<?php

namespace Wordpress\Support\Debug;

use Wordpress\Support\Facades\Filesystem\DirectoryComposer;
use Wordpress\Support\DateTime\WpCarbon;

class Debugger
{
    private DirectoryComposer $directoryComposer;
    private WpCarbon $wpCarbon;

    public function __construct()
    {
        $this->directoryComposer = new DirectoryComposer();
        $this->wpCarbon = new WpCarbon();
    }
    public static function die_and_dump(...$variables): void
    {
        foreach ($variables as $variable) {
            echo '<pre>';
            var_dump($variable);
            echo '<pre>';
        }
        exit;
    }

    public function log($text): void
    {
        $today = $this->wpCarbon->format('Y-m-d');
        $filename = "{$this->directoryComposer->logsRoot}/{$today}.log";
        if (file_exists($filename)) {
            $data = file_get_contents($filename);
            if (!is_array($text)) {
                $data .= "$text\n";
            } else if (is_array($text)) {
                foreach($text as $key => $value){
                    $data .= "$key => $value\n";
                }
            }
            file_put_contents($filename, $data);
        } else {
            file_put_contents($filename, "$text\n");
        }
    }

    public function perform_memory_usage(): void
    {
        $this->log($this->convert_memory_usage(memory_get_usage(true)));
    }

    private function convert_memory_usage($size): string
    {
        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
        return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
}
