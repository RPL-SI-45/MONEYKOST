<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterNotificationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/login')
                    ->clickLink('Sign up')
                    ->assertPathIs('/register')
                    ->type('username','eunike')
                    ->type('email','eunike@gmail.com')
                    ->type('no_kamar','19')
                    ->type('no_hp','012309784632')
                    ->type('password','12345')
                    ->check('terms')
                    ->assertSee('Sign up')
                    ->press('Sign up')
                    ->assertSee('Sign In')
                    ->clickLink('Sign In')
                    ->type('email','admin@gmail.com')
                    ->type('password','123')
                    ->press('@submit')
                    ->assertPathIs('/dashboardmain/customer')
                    ->visit('/dashboard/admin/ordernotif');
        });
    }
}
