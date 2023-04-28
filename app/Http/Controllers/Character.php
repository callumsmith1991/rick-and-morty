<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;

class Character extends ApiWrapper
{

    public function __construct()
    {
        $this->endpoint = '/character';     
    }
    public function getAllCharacters() : View
    {
        $response = $this->get();

        return view('home', ['pages' => $response['info']['pages'], 'results' => $response['results']]);
    }

    public function getCharacter(string $id) : View
    {
        $this->setEndpoint($id);

        $response = $this->get();

        $test = 'test';

        return view('character');
    }

    private function setEndpoint(string $id) : Void
    {
        $this->endpoint = '/character/'.$id.'';
    }

}
