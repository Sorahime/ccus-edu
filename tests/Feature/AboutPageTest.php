<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_shows_the_ccus_edu_profile(): void
    {
        $response = $this->get(route('about'));

        $response->assertOk()
            ->assertSeeText('Tentang Kami')
            ->assertSeeText('Mengenal CCUS Edu')
            ->assertSeeText('Visi')
            ->assertSeeText('Misi')
            ->assertSeeText('Tim Pengembang')
            ->assertSeeText('Mahasiswa Universitas Pertamina.')
            ->assertSeeText('ccusedu@universitaspertamina.ac.id');
    }

    public function test_home_navigation_links_to_the_about_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('href="'.route('about').'"', false);
    }
}
