<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scytaleController extends Controller
{
    public function index()
    {
        return view('scytale');
    }

    public function encrypt(Request $request)
    {
        $plaintext = strtoupper($request->input('plaintext'));
        $diameter = $request->input('diameter');

        $ciphertext = $this->scytaleCipher($plaintext, $diameter,true);

        return view('scytale', compact('ciphertext'));
    }


    public function decrypt(Request $request)
    {
        $ciphertext = $request->input('ciphertext');
        $diameter = $request->input('diameter');

        $plaintext = $this->scytaleCipher($ciphertext, $diameter, false);

        return view('scytale', compact('plaintext'));
    }

    private function scytaleCipher($text, $diameter, $isEncrypt)
    {
        $result = '';
        $length = strlen($text);
        $numRows = ceil($length / $diameter);
    
        if ($isEncrypt) {
            // Encryption
            for ($i = 0; $i < $diameter; $i++) {
                for ($j = $i; $j < $length; $j += $diameter) {
                    $result .= $text[$j];
                }
            }
        } else {
            // Decryption
            $numCols = ceil($length / $numRows);
            $padding = ($numCols * $numRows) - $length;
    
            // Add padding to the ciphertext
            $text .= str_repeat('*', $padding);

            $grid = array();
            $row = $col = 0;
    
            for ($i = 0; $i < $length; $i++) {
                if ($col == 0) {
                    $grid[$row] = array();
                }
    
                $grid[$row][$col] = '*';
                $col++;
    
                if ($col == $numCols) {
                    $col = 0;
                    $row++;
                }
            }
    
            // for ($i = 0; $i < $length; $i++) {
            //     $grid[$row][$col] = '*';
            //     $col++;
            //     if ($col == $numRows) {
            //         $col = 0;
            //         $row++;
            //     }
            // }
    
            $index = 0;
            for ($i = 0; $i < $numRows; $i++) {
                for ($j = 0; $j < $numCols; $j++) {
                    if (isset($grid[$j][$i]) && $grid[$j][$i] === '*') {
                        $grid[$j][$i] = $text[$index++];
                    }
                }
            }
            // for ($i = 0; $i < $numRows; $i++) {
            //     for ($j = 0; $j < $numCols; $j++) {
            //         if ($grid[$j][$i] === '*') {
            //             $grid[$j][$i] = $text[$index++];
            //         }
            //     }
            // }
    
            // for ($i = 0; $i < $numRows; $i++) {
            //     for ($j = 0; $j < $numCols; $j++) {
            //         $result .= $grid[$j][$i];
            //     }
            // }
            for ($i = 0; $i < $numCols; $i++) {
                for ($j = 0; $j < $numRows; $j++) {
                    if (isset($grid[$j][$i]) && $grid[$j][$i] !== '*') {
                        $result .= $grid[$j][$i];
                    }
                }
            }
            // for ($i = 0; $i < $numCols; $i++) {
            //     for ($j = 0; $j < $numRows; $j++) {
            //         if (isset($grid[$j][$i])) {
            //             $result .= $grid[$j][$i];
            //         }
            //     }
            // }

            // for ($i = 0; $i < $numCols; $i++) {
            //     for ($j = 0; $j < $numRows; $j++) {
            //         $result .= $grid[$i][$j];
            //     }
            // }
        }
    
        return $result;
    }
}


