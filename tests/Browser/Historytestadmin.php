<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Historytestadmin extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $browser->visit('/')
                ->assertPathIs('/login')
                ->assertSee('Sign In')
                ->type('email','admin@gmail.com')
                ->type('password','123')
                ->press('submit')
                ->assertPathIs('/dashboardmain/customer')
                ->visit('dashboard/admin/history-orders')
                ->assertSee('History Orders');
    }
}
