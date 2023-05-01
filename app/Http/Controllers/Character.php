<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Nette\Utils\Paginator;
use SebastianBergmann\Type\VoidType;

class Character extends ApiWrapper
{

    public function __construct()
    {
        $this->endpoint = '/character';     
    }
    public function getAllCharacters(Request $request) : View
    {

        if($request->all()['page']) {

            $this->setEndpoint('/character?page='.$request->all()['page']);
        }

        $response = $this->get();

        $paginate = new LengthAwarePaginator($response['results'], $response['info']['count'], 20);

        return view('home', [
            'pages' => $response['info']['pages'], 
            'results' => $response['results'],
            'pagination' => $paginate
        ]);
    }

    public function getCharacter(string $id) : View
    {
        $this->setEndpoint('/character/'.$id);

        $response = $this->get();

        return view('character', $response);
    }

    private function setEndpoint(string $input) : Void
    {
        $this->endpoint = $input;
    }

}
