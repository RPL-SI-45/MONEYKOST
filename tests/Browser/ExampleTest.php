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
            $browser->visit('/')
                    ->assertPathIs('/login')
                    ->assertPathIs('/register')
                    ->type('username','eunike')
                    ->type('email','eunike@gmail.com')
                    ->type('no_kamar','19')
                    ->type('no_hp','012309784632')
                    ->type('password','12345')
                    ->press('')
                    ->assertSee('Sign In')
                    ->press('submit');
        });
    }
}
