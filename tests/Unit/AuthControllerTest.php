<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\AuthController;

class AuthControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

//    public function test(){
//          $this->assertTrue(true);
//    }
    public function testFindUser()
    {
          $user= \App\User::first();
          $con=new AuthController();
          $username=$con->findUser($user);
          $this->assertEquals($username->name, 'Sagar nasit');
    }
}
