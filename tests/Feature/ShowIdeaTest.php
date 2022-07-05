<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeaTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function list_of_ideas_show_on_main_page()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'jako',
            'description' => 'toto je ppopis'
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
    }

    /** @test */
    public function single_idea_shows_correctly_on_the_show_page()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'jako',
            'description' => 'toto je ppopis'
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
    }
}
