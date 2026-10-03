<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeLandingTest extends TestCase
{
    public function test_home_highlights_products_before_services()
    {
        $this->get('/')->assertOk()
            ->assertSee('One team for')
            ->assertSee('images/products/minterp.png')
            ->assertSee('images/products/mintpos.png')
            ->assertSeeInOrder(['<section id="home"', '<section id="products"', '<section id="services"'], false);
    }
}
