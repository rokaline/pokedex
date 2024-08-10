
<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class PokemonTest extends DuskTestCase
{

    public function testCreatePokemon()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/pokemon/create')
                ->type('nom', 'Pikapuf Test')
                ->attach('img_path', __DIR__.'/images/pika2.jpg') // Assurez-vous que le chemin est correct
                ->type('pv', '120')
                ->type('poids', '50')
                ->type('taille', '25')
                ->select('type_obligatoire', '1') // Sélectionner un type obligatoire; assurez-vous que '1' est un ID valide
                ->select('type_optionnel', '2') // Sélectionner un type optionnel; assurez-vous que '2' est un ID valide
                ->press('Créer Pokémon')
                ->assertPathIs('/pokemon') // Vérifier que la redirection est correcte
                ->assertSee('Pikapuf Test'); // Vérifier que le Pokémon créé est bien affiché
    });
}


}


    // public function testDeletePokemon()
    // {
    //     $this->browse(function(Browser $browser) {
    //         // On suppose que l'utilisateur avec l'ID 1 est un administrateur qui peut supprimer des Pokémon
    //         $user = User::find(1);

    //         // On suppose qu'il y a déjà un Pokémon à supprimer, ici on récupère le premier
    //         $pokemon = Pokemon::first();

    //         // On utilise le nom du Pokémon pour vérifier qu'il a été supprimé
    //         $pokemonName = $pokemon->nom;

    //         $browser->loginAs($user)
    //             ->visit('/dashboard') // check du tableau général
    //             ->waitForText('Liste des Pokémon')
    //             ->click('#Delete'.$pokemon->id) // suppression du Pokémon
    //             ->waitForText('Êtes-vous sûr')
    //             ->click('#deleteok') // confirmation de la suppression
    //             ->pause(2000) // tps pour suppression
    //             ->visit('/dashboard') // retour à la liste des Pokémon
    //             ->assertDontSee($pokemonName); // verification de la suppression du pok en question
    //     });
    // }



