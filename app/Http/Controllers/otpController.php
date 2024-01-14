<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class otpController extends Controller
{
    public function index()
    {
        return view('vernam');
    }

    public function encrypt(Request $request)
    {
        $plaintext = strtoupper($request->input('plaintext'));
        $key = strtoupper($request->input('key'));

        $ciphertext = $this->vernamEncrypt($plaintext, $key);

        return view('vernam', compact('ciphertext'));
    }

    public function decrypt(Request $request)
    {
        $ciphertext = strtoupper($request->input('ciphertext'));
        $key = strtoupper($request->input('key'));

        $plaintext = $this->vernamDecrypt($ciphertext, $key);

        $ciphertext = "";
        return view('vernam', compact('plaintext','ciphertext'));
    }

    private function vernamEncrypt($plaintext, $key)
    {
        $ciphertext = '';

        $plaintextLength = strlen($plaintext);
        $keyLength = strlen($key);

        for ($i = 0; $i < $plaintextLength; $i++) {
            $char = $plaintext[$i];

            $keyChar = $key[$i % $keyLength];

            $encryptedChar = chr((ord($char) + ord($keyChar)) % 26 + 65);

            $ciphertext .= $encryptedChar;
        }

        return $ciphertext;
    }

    private function vernamDecrypt($ciphertext, $key)
    {
        $plaintext = '';

        $ciphertextLength = strlen($ciphertext);
        $keyLength = strlen($key);

        for ($i = 0; $i < $ciphertextLength; $i++) {
            $char = $ciphertext[$i];

            $keyChar = $key[$i % $keyLength];

            $decryptedChar = chr((ord($char) - ord($keyChar) + 26) % 26 + 65);

            $plaintext .= $decryptedChar;
        }

        return $plaintext;
    }
}
