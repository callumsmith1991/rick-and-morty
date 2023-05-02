<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Array_;

class ApiWrapper extends Controller
{
    private $apiUrl = 'https://rickandmortyapi.com/api';
    protected $endpoint;

    protected function get() : Array
    {
        return Http::get($this->apiUrl.''.$this->endpoint)->json();
    }

    protected function setEndpoint(string $input) : Void
    {
        $this->endpoint = $input;
    }

    protected function responseIsError(array $response) : bool
    {
        if(isset($response['error'])) {
            return true;
        }

        return false;
    }
}
