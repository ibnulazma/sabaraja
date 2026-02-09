<?php

function encrypt_id($id)
{
    $encrypter = \Config\Services::encrypter();
    return bin2hex($encrypter->encrypt($id));
}

function decrypt_id($hash)
{
    $encrypter = \Config\Services::encrypter();
    return $encrypter->decrypt(hex2bin($hash));
}
