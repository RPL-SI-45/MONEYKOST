<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->assertPathIs('http://127.0.0.1:8000/login')
                    ->type('email','ufar@gmail.com')
                    ->type('password','12345678')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->clickLink('Post')
                    ->assertPathIs('/post')
                    ->clickLink('show')
                    ->assertPathIs('/post/1')
                    ;
        });
    }
}