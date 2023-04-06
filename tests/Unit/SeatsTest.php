<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class SeatsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_seats_store()
    {
        $response = $this->call('POST','/seats',[
            'seat_nr' => 'B6',
            'room_id' => '1'
        ]);

        $response->assertStatus($response->status(),200);
        //dd($response);
        $response->assertRedirect('/seats');
    }

    public function test_room_store(){
        $response = $this->call('POST','/rooms',[
            'room_name' => 'Room3',
            'movie_title' => 'The Menu',
            'movie_description' => 'testtest',
            'image' => 'resources/images/themenu.jpg'
        ]);

        $response->assertStatus($response->status(),200);
        //dd($response);
        $response->assertRedirect('/rooms');
    }
}
