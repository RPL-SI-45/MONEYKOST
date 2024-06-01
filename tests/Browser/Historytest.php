<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Historytest extends DuskTestCase
{
    /**
     * @History
     */
    public function testExample(): void
    {
        $browser->visit('/')
                ->assertPathIs('/login')
                ->assertSee('Sign In')
                ->type('email','ujang@gmail.com')
                ->type('password','123')
                ->press('submit')
                ->assertPathIs('/pembayaranlaundry/customer')
                ->visit('dashboard/customer/order-history')
                ->assertSee('History Orders');
    }
}
