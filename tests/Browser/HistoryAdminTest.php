<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HistoryAdminTest extends DuskTestCase
{
    /**
     *@group historyadmin
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertPathIs('/login')
            ->assertSee('Sign In')
            ->type('email','ujang@gmail.com')
            ->type('password','12345')
            ->press('@submit')
            ->assertPathIs('/dashboardmain/customer')
            ->visit('dashboard/admin/history-orders')
            ->assertSee('History Orders');
        });
    }
}
