<?php

namespace Wordpress\Support\Facades\Faker;

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
        }
        return $token;
    }
}
