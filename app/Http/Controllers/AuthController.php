<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return [
        'NIS' => 3103120128,
        'Name' => 'Luthfina',
        'Phone' => '08123456789',
        'Class' => 'XII RPL 4'
        ];
    }
};
