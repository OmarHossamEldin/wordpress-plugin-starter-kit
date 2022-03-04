<?php

namespace Wordpress\Support\Debug;

use Wordpress\Support\Facades\Filesystem\Directory;
use Wordpress\Support\DateTime\WpCarbon;

class Debugger
{
    private Directory $directory;
    private WpCarbon $wpCarbon;

    public function __construct()
    {
        $this->directory = new Directory();
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
        $filename = "{$this->directory->logsRoot}/{$today}.log";
        if (file_exists($filename)) {
            $data = file_get_contents($filename);
            if (!is_array($text)) {
                $data .= "\n $text";
            } else if (is_array($text)) {
                $text = implode("\n", $text);
                $data .= "\n $text";
            }
            file_put_contents($filename, $data);
        } else {
            file_put_contents($filename, $text);
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
