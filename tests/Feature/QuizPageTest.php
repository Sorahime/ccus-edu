<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuizPageTest extends TestCase
{
    public function test_quiz_page_renders_setup_and_marks_its_navigation_link_active(): void
    {
        $this->get('/uji-pemahaman')
            ->assertOk()
            ->assertSee('Uji Pemahaman')
            ->assertSee('Seberapa Paham Kamu tentang CCUS?')
            ->assertSee('Pilih Kategori Materi')
            ->assertSee('Evaluasi')
            ->assertSee('nav-link active', false);
    }
}
