<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VigenereCipher extends Model
{
    use HasFactory;
    public static function encrypt($plaintext, $key)
    {
        $key = strtoupper($key);
        $keyLength = strlen($key);
        $plaintext = strtoupper($plaintext);
        $ciphertext = '';

        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];
            if (ctype_alpha($char)) {
                $charCode = ord($char) - 65;
                $keyChar = $key[$i % $keyLength];
                $keyCode = ord($keyChar) - 65;
                $encryptedCharCode = ($charCode + $keyCode) % 26;
                $encryptedChar = chr($encryptedCharCode + 65);
                $ciphertext .= $encryptedChar;
            } else {
                $ciphertext .= $char;
            }
        }

        return $ciphertext;
    }

    public static function decrypt($ciphertext, $key)
    {
        $key = strtoupper($key);
        $keyLength = strlen($key);
        $ciphertext = strtoupper($ciphertext);
        $plaintext = '';

        for ($i = 0; $i < strlen($ciphertext); $i++) {
            $char = $ciphertext[$i];
            if (ctype_alpha($char)) {
                $charCode = ord($char) - 65;
                $keyChar = $key[$i % $keyLength];
                $keyCode = ord($keyChar) - 65;
                $decryptedCharCode = ($charCode - $keyCode + 26) % 26;
                $decryptedChar = chr($decryptedCharCode + 65);
                $plaintext .= $decryptedChar;
            } else {
                $plaintext .= $char;
            }
        }

        return $plaintext;
    }
}
