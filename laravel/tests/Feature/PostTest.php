<?php

namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewDashboard()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/dashboard');
        $response->assertStatus(200);
    }
    public function testViewListPost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/list-post');
        $response->assertStatus(200);
    }
    public function testViewAddPost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/add-new-post');
        $response->assertStatus(200);
    }
    public function testMethodActionAddPost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/action-add-new-post');
        $response->assertStatus(405);
    }
    public function testActionAddPost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->post('admin/action-add-new-post');
        $response->assertStatus(302);
    }
    public function testViewUpdatePost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/update-post/1');
        $response->assertStatus(200);
    }
    public function testMethodActionUpdatePost()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
        ->get('admin/action-update-post/1');
        $response->assertStatus(405);
    }
}
