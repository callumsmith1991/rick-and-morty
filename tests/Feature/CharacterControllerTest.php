<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homepage(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('results');
    }

    public function test_search(): void
    {
        $response = $this->post('/search', [
            "name" => "Rick"
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('results');
    }

    public function test_invalid_search() : void
    {

        $response = $this->post('/search', [
            "name" => "23421957412974174214"
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('error');

    }

    public function test_search_validation() : void
    {

        $response = $this->post('/search', [
            "name" => "23421957412974174214"
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('errors');

    }

    public function test_pagination() : void
    {
        $response = $this->get('/?page=10');
        $response->assertStatus(200);
        $response->assertViewHas('results');
    }

    public function test_invalid_pagination() : void
    {
        $response = $this->get('/?page=34587345987345');
        $response->assertStatus(200);
        $response->assertViewHas('error');
    }

    public function test_character_page_without_id() : void
    {
        $response = $this->get('/character');
        $response->assertStatus(404);
    }

    public function test_character_page() : void
    {
        $response = $this->get('/character/1');
        $response->assertStatus(200);
        $response->assertViewHas('name');
    }

    public function test_character_page_with_invalid_id() : void
    {
        $response = $this->get('/character/346346346');
        $response->assertStatus(200);
        $response->assertViewHas('error');
    }

}
