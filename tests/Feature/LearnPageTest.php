<?php

namespace Tests\Feature;

use Tests\TestCase;

class LearnPageTest extends TestCase
{
    public function test_the_ccus_learning_page_uses_the_new_name_and_material_list(): void
    {
        $response = $this->get('/belajar-ccus');

        $response->assertOk()
            ->assertSee('Belajar CCUS')
            ->assertSee('Materi Belajar CCUS')
            ->assertSee('Pengantar CCUS')
            ->assertSee('Carbon Capture');
    }

    public function test_old_learning_urls_redirect_to_the_ccus_urls(): void
    {
        $this->get('/belajar-ccs')
            ->assertRedirect('/belajar-ccus');

        $this->get('/belajar-ccs/carbon-capture')
            ->assertRedirect('/belajar-ccus/carbon-capture');
    }
}
