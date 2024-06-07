<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WifiNotificationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group wifi
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
                    ->clickLink('Pembayaran Wifi')
                    ->assertPathIs('/dashboard/customer/pembayaranwifi')
                    ->press('@submit')
                    ->assertSee('Nama Customer')
                    ->select('id_customer','15')
                    ->type('tanggal_tagihan','06/06/2024')
                    ->select('paket','10 Mbps')
                    ->press('@submit')
                    ->clickLink('Log out')
                    ->assertPathIs('/login')
                    ->assertSee('Sign In')
                    ->type('email','admin@gmail.com')
                    ->type('password','123')
                    ->press('@submit')
                    ->assertPathIs('/dashboardmain/customer')
                    ->visit('/dashboard/admin/ordernotif')
                    ;
        });
    }
}
