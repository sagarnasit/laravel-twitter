<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class EmailTest extends DuskTestCase
{
    /**
     * test do login int he browser and send a mail to the email provided.
     *
     * @return void
     */
    public function testEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/home')//open home page
                    ->click('button[type="button"]')//click on button
                    ->value('#email', 'sagarnasit@gmail.com')//insert this email
                    ->click('button[type="submit"]')//click on button
                    ->assertSee('Sent');//find the expected message.
        });
    }
}
