<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Defuse\Crypto\Crypto;
use Illuminate\Support\Facades\Crypt;

class DESController extends Controller
{
  public function index(){
    return view('des.DES');
  }
  public function encrypt(Request $request)
  {
      $plaintext = $request->input('plaintext');
      $key = $request->input('key');
      // $key = 'audrey'; // Replace with your own secret key

      $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('DES'));
      $encrypted = openssl_encrypt($plaintext, 'DES-CBC', $key, OPENSSL_RAW_DATA, $iv);
      $ciphertext = base64_encode($iv . $encrypted);
      
      return view('des.DES', compact('ciphertext'));
  }
  
  public function decrypt(Request $request)
  {
      $ciphertext = $request->input('ciphertext');
      $key = $request->input('key');
      // $key = 'xavie'; // Replace with your own secret key

      $ciphertext = base64_decode($ciphertext);
      $iv = substr($ciphertext, 0, openssl_cipher_iv_length('DES'));
      $encrypted = substr($ciphertext, openssl_cipher_iv_length('DES'));
      $plaintext = openssl_decrypt($encrypted, 'DES-CBC', $key, OPENSSL_RAW_DATA, $iv);
      
      return view('des.DES', compact('plaintext'));
  }
}
