<?php

namespace Wordpress\Support\Facades\Faker;

use Wordpress\Support\Facades\Filesystem\DirectoryComposer;
use Wordpress\Support\Facades\Filesystem\DirectoryMaker;

class FakerImage
{
    private DirectoryComposer $directoryComposer;
    private DirectoryMaker $directoryMaker;

    public function __construct()
    {
        $this->directoryComposer = new DirectoryComposer();
        $this->directoryMaker = new DirectoryMaker();
    }

    public function fake_image($folder, $image)
    {
        $directory = $this->directoryComposer->uploadPath['basedir'] . '/' . $this->directoryComposer::PLUGIN_NAME_DIR . '/' . $folder . '/';
        $this->directoryMaker->make_directory($directory);

        $imagePath = $directory . $image;

        $fp = fopen($imagePath, 'w+');
        $ch = curl_init('https://picsum.photos/200/300');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_exec($ch);

        curl_close($ch);
        fclose($fp);
    }
}
