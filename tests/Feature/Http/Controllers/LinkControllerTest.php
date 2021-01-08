<?php

namespace Tests\Feature\Controllers;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $link;

    public function setUp(): void
    {
        parent::setUp();
        $this->link = Link::factory()->create(['clicks_count' => 0]);
    }

    public function test_welcome_screen_can_be_rendered(): void
    {
        $response = $this->get('/welcome');

        $response->assertStatus(200);
    }


    public function test_stats_screen_can_be_rendered(): void
    {
        $response = $this->get('/stats');

        $response->assertStatus(200);
    }


    public function test_click_can_be_found():void
    {
        $response = $this->get('/links/' . $this->link->uuid);

        $response->assertStatus(302);
    }

    public function test_link_click_count_increments(): void
    {
        $this->assertEmpty($this->link->clicks_count);

        $this->get('/links/' . $this->link->uuid);

        $this->assertCount(1,$link = Link::query()->get());
        $this->assertEquals(1, $link->first()->clicks_count);
    }

    public function test_link_click_saves_event(): void
    {
        $this->assertEmpty(\DB::table('stored_events')->get());

        $response = $this->get('/links/' . $this->link->uuid);

        $this->assertCount(1, $event = \DB::table('stored_events')->get());

        $response
            ->assertCookie(
                'lastEvent', str_replace([': ', ', '],
                    [':', ','], $event->first()->event_properties)
            );
    }

    public function test_link_click_saves_uuid_to_session():void
    {
        $response = $this->get('/links/' . $this->link->uuid);

        $response->assertSessionHas('uuid', $this->link->uuid)
            ->assertRedirect(route('register'));
    }

    public function test_link_click_redirects():void
    {
        $response = $this->get('/links/' . $this->link->uuid);

        $response->assertRedirect(route('register'));
    }
}
