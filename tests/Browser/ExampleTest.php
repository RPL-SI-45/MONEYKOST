<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/login')
                    ->assertSee('Sign In')
                    ->type('email','admin@gmail.com')
                    ->type('password','123')
                    ->press('Sign in')
                    ->assertPathIs('/dashboardmain/customer')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/dashboardmain/admin')
                    ;
        });
    }
}
