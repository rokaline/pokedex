
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
                ->assertSee('Homepage')
                ->assertSee('Login')
                ->assertSee('Site officiel Pokemon');
        });
    }


    public function testLoadingOnePokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Attendre 2 secondes
                ->assertSee('Hydroshock');
        });
    }


    public function testLoadingImage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Attendre 2 secondes pour s'assurer que la page a fini de se charger
                ->assertVisible('img[src*="mossblade.jpg"]'); // Vérifiez que l'image est bien visible sur la page d'accueil
        });
    }


}





