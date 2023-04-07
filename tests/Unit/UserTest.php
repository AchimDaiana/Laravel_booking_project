<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form(){
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication(){
        $user1 = User::make([
            'firstname' => 'andra',
            'lastname' => 'andra',
            'email' => 'andra@yahoo.com',
            'password' => 'andra'
        ]);

        $user2 = User::make([
            'firstname' => 'anca',
            'lastname' => 'anca',
            'email' => 'anca@yahoo.com',
            'password' => 'anca'
        ]);

        $this->assertTrue($user1->firstname != $user2->firstname);
    }


   /* public function test_delete_user(){
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }
        $this->assertTrue(true);
    }

    public function test_if_stores_new_users(){
        $response = $this->post('/register',[
            'firstname' => 'daiana',
            'lastname' => 'daiana',
            'email' => 'daiana@yahoo.com',
            'password' => 'daiana'
        ]);

        $response->assertRedirect('/');
    }*/
    public function test_database_has() {
        $this->assertDatabaseHas('users',[
            'firstname' => 'admin',
        ]);
    }

    public function test_database_missing(){
        $this->assertDatabaseMissing('users',[
            'firstname' => 'andra'
        ]);
    }

    public function test_login_action(){
        $response = $this->post('/login',[
            'email' =>'admin@yahoo.com',
            'password' => 'admin1000'
        ]);

        $response->assertRedirect('/');
        //dd($response);


    }

   /* public function test_if_seeders_works(){
        $this->seed();
    }*/

}
