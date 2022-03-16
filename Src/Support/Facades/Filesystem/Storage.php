<?php

namespace Wordpress\PluginName\Support\Facades\Filesystem;

use Wordpress\PluginName\Support\DateTime\WpCarbon;

class Storage
{
    private DirectoryComposer $directoryComposer;
    private DirectoryMaker $directoryMaker;

    public function __construct()
    {
        $this->directoryComposer = new DirectoryComposer();
        $this->directoryMaker = new DirectoryMaker();
    }

    public function move_template(string $template)
    {
        $templateTo = "{$this->directoryComposer->themes}$template";
        if ($this->directoryMaker->make_directory($templateTo)) {
            $templateFrom = "{$this->directoryComposer->storageRoot}/$template";
            $this->directoryMaker->recurse_copy($templateFrom, $templateTo);
        }
    }

    public function uploadFile($file, $folder)
    {

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000_000) {
                    $fileNameNew = uniqid() . "." . $fileActualExt;
                    // check $folder is existed

                    $dirname = $this->directoryMaker->uploadPath . '/' . $folder . '/';
                    $this->directoryMaker->make_directory($dirname);

                    $fileDestination = $dirname . $fileNameNew;

                    move_uploaded_file($fileTmpName, $fileDestination);

                    return $fileNameNew;
                    // end here
                } else {
                    // error
                }
            } else {

                // error
            }
        } else {

            // error
        }
    }

    public function save_key_token(string $key): void
    {
        $wpCarbon = new WpCarbon();
        $tokensDir = "{$this->directoryComposer->storageRoot}/Tokens/{$wpCarbon->format->format('Y_M_D')}";
        if ($this->directoryMaker->make_directory($tokensDir)) {
            $fileName = "$tokensDir/key";
            file_put_contents($fileName, $key);
        }
    }

    public function get_key_token(): string
    {
        $wpCarbon = new WpCarbon();
        $tokensDir = "{$this->directoryComposer->storageRoot}/Tokens/{$wpCarbon->format->format('Y_M_D')}";
        if ($this->directoryMaker->make_directory($tokensDir)) {
            $fileName = "$tokensDir/key";
            $key = file_get_contents($fileName);
        }
        return $key;
    }
}
