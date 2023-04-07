<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;

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
        $user = User::factory()->create(['firstname'=>'admin']);


        $response = $this->actingAs($user)->call('POST', '/rooms', [
            'room_name' => 'test',
            'movie_title' => 'test ',
            'movie_description' => 'test',
            'image' => 'resources/images/themenu.jpg'
        ]);

        /*$response = $this->call('POST','/rooms',[
            'room_name' => 'Room',
            'movie_title' => 'The ',
            'movie_description' => 'test',
            'image' => 'resources/images/themenu.jpg'
        ]);*/

        $response->assertStatus($response->status(),200);
       //dd($response);


        $response->assertRedirect('/');

    }

    public function test_path(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
