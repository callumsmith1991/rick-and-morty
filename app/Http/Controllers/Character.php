<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Character extends ApiWrapper
{

    public function __construct()
    {
        $this->endpoint = '/character';
    }
    public function getAllCharacters() : View
    {
        $characters = $this->get();
        return view('welcome', $characters);
    }
}
