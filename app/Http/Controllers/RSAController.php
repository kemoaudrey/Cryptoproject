<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RSAController extends Controller
{
    public function index(){
        return view('rsa.RSA');
      }

    public function encrypt(Request $request)
    {
        $plaintext = $request->input('plaintext');
        $public_Key = $request->input('key');
        // $publicKey = 'your_public_key'; // Replace with your own public key
        // $publicKey = openssl_pkey_get_public(file_get_contents('./app/pem/public_key.pem'));
        // $publicKey = openssl_pkey_get_public(file_get_contents('./pem/public_key.pem'));
        // $plaintext = "Your plaintext data here";
        
        // Encrypt the plaintext using the public key
        $encrypted = openssl_public_encrypt($plaintext, $ciphertext, $public_Key);
        
        if ($encrypted) {
            // Encryption successful
            echo "Encryption successful. Encrypted data: " . base64_encode($ciphertext);
        } else {
            // Encryption failed
            echo "Encryption failed. Please check your public key and plaintext.";
        }
        // $encrypted = openssl_public_encrypt($plaintext, $ciphertext, $publicKey);
        $encodedCiphertext = base64_encode($ciphertext);
        
        return view('rsa.RSA', compact('encodedCiphertext'));
    }
    
    public function decrypt(Request $request)
    {
        $encodedCiphertext = $request->input('ciphertext');
        $privateKey = $request->input('key');
        // $privateKey = 'your_private_key'; // Replace with your own private key

        $ciphertext = base64_decode($encodedCiphertext);
        $decrypted = openssl_private_decrypt($ciphertext, $plaintext, $privateKey);
        
        return view('rsa.RSA', compact('plaintext'));
    }
}
