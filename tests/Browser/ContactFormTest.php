<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactFormTest extends DuskTestCase
{
    /**
     * @test
     * @return void
     */
    public function visitContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Nome completo');
        });
    }

    /**
     * @test
     * @return void
     */
    public function testIfInputExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->type(field: 'name', value:'Silvio Watakabe')
                    ->type(field: 'email', value:'swat@teste.com.br')
                    ->type(field: 'message', value:'Teste de mensagem')
                    ->press(button: 'Enviar mensagem')
                    ->waitFor(selector: '.toast-message')
                    ->assertPathIs(path:'/contato')
                    ->assertSee(text: 'Contato enviado com sucesso!');
        });
    }    
}
