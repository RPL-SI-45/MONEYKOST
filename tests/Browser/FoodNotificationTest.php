<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FoodNotificationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group food
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/login')
                    ->assertSee('Sign In')
                    ->type('email','eunike@gmail.com')
                    ->type('password','12345')
                    ->press('@submit')
                    ->assertPathIs('/pembayaranlaundry/customer')
                    ->clickLink('Menu Makanan')
                    ->assertPathIs('/dashboard/customer/menumakanan')
                    ->press('@submit')
                    ->assertPathIs('/dashboard/menumakanan/1')
                    ->clickLink('Log out')
                    ->assertPathIs('/login')
                    ->assertSee('Sign In')
                    ->type('email','admin@gmail.com')
                    ->type('password','123')
                    ->press('@submit')
                    ->assertPathIs('/dashboardmain/customer')
                    ->visit('/dashboard/admin/ordernotif');
        });
    }
}
