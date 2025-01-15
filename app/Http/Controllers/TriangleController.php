<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriangleController extends Controller
{
    public function show($x)
    {
        // Validasi nilai x
        if ($x < 1 || $x > 10) {
            abort(404, 'Invalid value for x. Must be between 1 and 10.');
        }

        $triangle = $this->generateTriangle($x);

        return view('triangle', ['triangle' => $triangle]);
    }

    private function generateTriangle($size)
    {
        $triangle = [];
        for ($i = 1; $i <= $size; $i++) {
            $line = str_repeat('o', $i);
            if ($i == 1) {
                $triangle[] = '<span style="color: red;">' . $line . '</span>';
            } else {
                $line = 'o' . str_repeat('o', $i - 2) . 'o';
                $triangle[] = '<span style="color: red;">o</span>' .
                              '<span style="color: black;">' . str_repeat('o', $i - 2) . '</span>' .
                              '<span style="color: red;">o</span>';
            }
        }
        return $triangle;
    }
}
