<?php

namespace App\Http\Controllers;

use App\Models\VigenereCipher;
use Illuminate\Http\Request;

class vigenereController extends Controller
{

    public function showForm()
    {
        return view('vigenere');
    }

    public function encrypt(Request $request)
    {
        $plaintext = strtoupper($request->input('plaintext'));
        $key = strtoupper($request->input('key'));
    
        $ciphertext = "";
        $plaintextLength = strlen($plaintext);
        $keyLength = strlen($key);
    
        for ($i = 0; $i < $plaintextLength; $i++) {
            $char = $plaintext[$i];
    
            if (ctype_alpha($char)) {
                $shift = ord($key[$i % $keyLength]) - 65;
    
                $char = chr(((ord($char) - 65 + $shift) % 26) + 65);
            }
    
            $ciphertext .= $char;
        }
    
        return view('vigenere', compact('ciphertext'));
    }


    public function decrypt(Request $request)
{
    $ciphertext ="";
    $ciphertext = strtoupper($request->input('ciphertext'));
    $key = strtoupper($request->input('key'));

    $plaintext = "";
    $ciphertextLength = strlen($ciphertext);
    $keyLength = strlen($key);

    for ($i = 0; $i < $ciphertextLength; $i++) {
        $char = $ciphertext[$i];

        if (ctype_alpha($char)) {
            $shift = ord($key[$i % $keyLength]) - 65;

            $char = chr(((ord($char) - 65 - $shift + 26) % 26) + 65);
        }

        $plaintext .= $char;
    }

    // $ciphertext = "";
    // dd($ciphertext);
    return view('vigenere', compact('plaintext','ciphertext'));
}

}
