<?php

namespace Wordpress\PluginName\Support\Facades\Faker;

use Wordpress\PluginName\Support\Facades\Filesystem\Storage;

class FakerString
{
    public function first_name($gender = 'male')
    {
    }

    public function words($count = 6)
    {
    }

    public function generate_token($length): string
    {
        $alphabetCaps = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphabetSmall = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '1234567890';
        $key = 'WP_ARTISAN';
        $token = '';
        $storage = new Storage();
        for ($i = 0; $i <= $length; $i++) {
            $alphabetCapsIndex = rand(0, strlen($alphabetCaps) - 1);
            $alphabetSmallIndex = rand(0, strlen($alphabetSmall) - 1);
            $numbersIndex = rand(0, strlen($numbers) - 1);
            $keyIndex = rand(0, strlen($key) - 1);
            $token .=
                $alphabetCaps[$alphabetCapsIndex] .
                $alphabetSmall[$alphabetSmallIndex] .
                $numbers[$numbersIndex] .
                $key[$keyIndex];
            $key = $alphabetCapsIndex . $alphabetSmallIndex . $numbersIndex . $keyIndex;
            $storage->save_key_token($key);
        }
        return $token;
    }
}
