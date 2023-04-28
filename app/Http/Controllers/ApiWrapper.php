<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiWrapper extends Controller
{
    private $apiUrl = 'https://rickandmortyapi.com/api';
    protected $endpoint;

    protected function get()
    {
        return Http::get($this->apiUrl.''.$this->endpoint)->json();
    }
}
