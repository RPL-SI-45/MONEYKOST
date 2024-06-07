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
                    ->assertSee ('Top Foods')
                    ->assertSee ('Money Kost')
                    ->assertSee ('TOTAL PEMBAYARAN')
                    ->assertSee ('TOTAL CUSTOMER')
                    ->assertSee ('TOTAL PEMBAYARAN KOST')
                    ->assertSee ('FOOD SALES')
                    ->clickLink ('Menu Makanan')
                    ->assertPathIs('/dashboard/admin/menumakanan')
                    ->assertSee ('Daftar Makanan')
                    ->press ('TAMBAH MAKANAN')
                    ->assertPathIs('/dashboard/kelolamenumakanan/create')
                    ->assertSee ('Tambah Menu')
                    ->press ('Tambah')
                    ->clickLink ('Menu Makanan')
                    ->assertPathIs('/dashboard/admin/menumakanan')
                    ->assertSee ('Daftar Makanan')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/dashboardmain/admin')
                    ;
        });
    }
}
