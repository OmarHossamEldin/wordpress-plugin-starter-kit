<?php

namespace Wordpress\Support\Facades\Filesystem;

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
}
