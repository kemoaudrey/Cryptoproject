<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class caesarController extends Controller
{
    public function yourMethod(Request $request)
{
    // A PHP program to illustrate Caesar Cipher Technique

    // This function receives text and shift and returns the encrypted text
    function encrypt($text, $s)
    {
        $result = "";

        // Traverse text
        for ($i = 0; $i < strlen($text); $i++) {
            // Apply transformation to each character Encrypt Uppercase letters
            if (ctype_upper($text[$i]))
                $result .= chr((ord($text[$i]) + $s - 65) % 26 + 65);

            // Encrypt Lowercase letters
            else
                $result .= chr((ord($text[$i]) + $s - 97) % 26 + 97);
        }

        // Return the resulting string
        return $result;
    }

    // Get user input from the request
    $text = $request->input('text');
    $s = $request->input('shift');
    $cipher = encrypt($text, $s);

    return view('caesar', compact('cipher'));

    // Function to decrypt the text using the Caesar Cipher technique

}

public function decrypt(Request $request)
{
    $text = $request->input('text');
    $s = $request->input('shift');

    $decryptedText = $this->performDecryption($text, $s);
    $cipher = "";
    return view('caesar', compact('decryptedText','cipher'));
}

private function performDecryption($text, $s)
{
    $result = "";

    // Traverse the cipher text
    for ($i = 0; $i < strlen($text); $i++) {
        // Apply reverse transformation to each character
        // Decrypt Uppercase letters
        if (ctype_upper($text[$i]))
            $result .= chr((ord($text[$i]) - $s - 65 + 26) % 26 + 65);
        
        // Decrypt Lowercase letters
        else
            $result .= chr((ord($text[$i]) - $s - 97 + 26) % 26 + 97);
    }

    // Return the resulting decrypted text
    return $result;
}

}
