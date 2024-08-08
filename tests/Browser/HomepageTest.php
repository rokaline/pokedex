
<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class HomepageTest extends DuskTestCase
{

    public function testLoadingHomepage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitForText('Homepage') // Attendre que le texte apparaisse
                ->assertSee('Homepage');
        });
    }



    public function testLoadingPokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Attendre 2 secondes
                ->assertSee('Hydroshock');
        });
    }



}




