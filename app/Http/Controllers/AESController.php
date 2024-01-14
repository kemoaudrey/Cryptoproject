<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AESController extends Controller
{
    public function index(){
        return view('aes.AES');
      }

    public function encrypt(Request $request)
    {
        $plaintext = $request->input('plaintext');
        $key = $request->input('key');
        // $key = 'your_secret_key'; // Replace with your own secret key

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $encrypted = openssl_encrypt($plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        $ciphertext = base64_encode($iv . $encrypted);
        
        return view('aes.AES', compact('ciphertext'));
    }
    
    public function decrypt(Request $request)
    {
        $ciphertext = $request->input('ciphertext');
        $key = $request->input('key');
        // $key = 'your_secret_key'; // Replace with your own secret key

        $ciphertext = base64_decode($ciphertext);
        $iv = substr($ciphertext, 0, openssl_cipher_iv_length('AES-256-CBC'));
        $encrypted = substr($ciphertext, openssl_cipher_iv_length('AES-256-CBC'));
        $plaintext = openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        
        return view('aes.AES', compact('plaintext'));
    }

}
