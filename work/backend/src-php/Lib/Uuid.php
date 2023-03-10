<?php

namespace Skills17\Lib;

class Uuid
{
    /**
     * Generate a random UUID v4
     *
     * @return string UUID
     */
    public static function v4(): string
    {
        $data = $data ?? random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
