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

        if(isset($request['page'])) {
            $this->setEndpoint('/character?page='.$request->all()['page']);
        } else {
            $this->setEndpoint('/character');
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

        if(!empty($response['episode'])) {
            foreach($response['episode'] as $episode) {
                $episodeInformation = (new Episode)->getEpisode($episode);
                $response['episodes'][$episodeInformation['id']] = $episodeInformation['episode'].' '.$episodeInformation['name']; 
            }
        }

        return view('character', $response);
    }

    public function searchCharacters(Request $request) : View
    {

        $validate = $request->validate([
            'name' => ['required', 'max:255']
        ]);

        $this->setEndpoint(('/character?name='.$validate['name'].''));

        $response = $this->get();

        return view('search', $response);

    }

}
