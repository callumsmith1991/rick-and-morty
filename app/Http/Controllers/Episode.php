<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Episode extends ApiWrapper
{
    public function __construct()
    {
        $this->endpoint = '/episode';
    }

    public function getAllEpisodes() : Array
    {
        return $this->get();
    }

    public function getEpisode(string $url) : Array
    {
        return Http::get($url)->json();
    }

}
