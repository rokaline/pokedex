
<?php

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class HomepageTest extends DuskTestCase
{

    public function testLoadingHomepage() // chargement Homepage
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitForText('Homepage') // Attendre que le texte apparaisse
                ->assertSee('Homepage')
                ->assertSee('Login')
                ->assertSee('Site officiel Pokemon');
        });
    }


    public function testLoadingOnePokemon() // chargement d'un pokemon: Florabloom
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Attendre 2 secondes
                ->waitForText('Florabloom')
                ->assertSee('Florabloom');
        });
    }


    public function testLoadingImage() //chargement image du pokemon Mossblade
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Attendre 2 secondes pour s'assurer que la page a fini de se charger
                ->assertVisible('img[src*="mossblade.jpg"]'); // Vérifiez que l'image est bien visible sur la page d'accueil
        });
    }


    public function testNameFilter() // recherche par nom
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitForText('Recherche Pokemon et caractéristiques')
                ->type('#search', 'Vineshroud')
                ->press('Rechercher')
                ->pause(2000)
                ->assertSee('Vineshroud') // Vérifie que le nom du Pokémon recherché est visible
                ->assertDontSee('Mickey'); // Vérifie que le nom d'un Pokémon non recherché n'est pas visible
        });
    }



    public function testSearchByType() // recherche par type
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->select('#type', 'Eau')
                ->press('Rechercher par Type')
                ->waitForText('Aquaflor')
                ->assertSee('Aquaflor');
        });
    }



}





