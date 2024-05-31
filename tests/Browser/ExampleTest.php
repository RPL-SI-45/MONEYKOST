<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
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
                    ->assertSee('Sign In')
                    ->type('email','aufar@gmail.com')
                    ->type('password','12345')
                    ->press('submit')
                    ->assertPathIs('/pembayaranlaundry/customer')
                    ->clickLink('Menu Makanan')
                    ->assertPathIs('/dashboard/customer/menumakanan')
                    ->press('beli')
                    ->assertPathIs('/dashboard/menumakanan/10');
                    
                    $attempts = 0;
                    $maxAttempts = 5;
                    while ($attempts < $maxAttempts) {
                        try {
                            $browser->scrollTo('@submit')->click('@submit');
                            break;
                        } catch (\Exception $e) {
                            $attempts++;
                            $browser->pause(1000); 
                        }
                    }

                    if ($attempts == $maxAttempts) {
                        throw new \Exception('Failed to click submit button after multiple attempts');
                    }
        
            $browser->assertPathIs('/dashboard/customer/cart')
                    ->press('@submit')
                    ->assertPathIs('/dashboard/customer/pembayaranmakanan')
                    ->attach('@inputgambar','C:\Users\aufar\Downloads\foto_woman11.jpg')
                    ->press('@submit')
                    ->assertPathIs('/dashboard/customer/terimakasih')
                    
                ;
                    
        });
    }
}