<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Casts\Json;
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

    protected function setEndpoint(string $input) : Void
    {
        $this->endpoint = $input;
    }
}
