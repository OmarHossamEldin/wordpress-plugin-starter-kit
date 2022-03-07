<?php

namespace Wordpress\Support\Facades\Faker;

class Faker
{
    public ImageFaker $imageFaker;

    public StringFaker $stringFaker;

    public function __construct()
    {
        $this->imageFaker = new ImageFaker();
        $this->stringFaker = new StringFaker();
    }
}
