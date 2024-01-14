<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class playfairController extends Controller
{
    public function index()
    {
        return view('playfair');
    }

    // public function encrypt(Request $request)
    // {
    //     $plaintext = $request->input('plaintext');
    //     $keyword = $request->input('keyword');

    //     // Perform encryption using the Playfair cipher algorithm

    //     // return view('playfair', compact('');
    // }

    // public function decrypt(Request $request)
    // {
    //     $ciphertext = $request->input('ciphertext');
    //     $keyword = $request->input('keyword');

    //     // Perform decryption using the Playfair cipher algorithm
        

    //     return view('playfair', ['decryptedText' => $decryptedText]);
    // }
    
}
