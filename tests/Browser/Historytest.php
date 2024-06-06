<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HistoryTest extends DuskTestCase
{
    /**
     *@group history
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertPathIs('/login')
            ->assertSee('Sign In')
            ->type('email','aufar@gmail.com')
            ->type('password','12345')
            ->press('@submit')
            ->assertPathIs('/pembayaranlaundry/customer')
            ->visit('dashboard/customer/order-history')
            ->assertSee('History Orders');
        });
    }
}
