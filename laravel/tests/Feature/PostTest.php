<?php

namespace Tests\Feature;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Model\PostModel;

class PostTest extends TestCase
{
    /**
     * Set user fake
     */
    public function setLogged(){
        $user = factory(User::class)->make();
        return $this->actingAs($user);
    }
    /**
     *
     * @return void
     */
    public function testViewDashboard()
    {
        $response = $this->setLogged()->get('admin/dashboard');
        $response->assertStatus(200);
    }
    public function testViewListPost()
    {
        $response = $this->setLogged()->get('admin/list-post');
        $response->assertStatus(200);
    }
    public function testViewAddPost()
    {
        $response = $this->setLogged()->get('admin/add-new-post');
        $response->assertStatus(200);
    }
    public function testMethodActionAddPost()
    {
        $response = $this->setLogged()->get('admin/action-add-new-post');
        $response->assertStatus(405);
    }
    public function testCreateActionAddPost()
    {
        $post = factory(PostModel::class)->make();
        $response = $this->setLogged()->post('admin/action-add-new-post',json_decode(json_encode($post),true));
        $response->assertRedirect('');
    }
    public function testActionAddPostValidator()
    {
        $response = $this->setLogged()->post('admin/action-add-new-post');
        $response->assertStatus(302);
    }
    public function testViewUpdatePost()
    {
        $response = $this->setLogged()->get('admin/update-post/1');
        $response->assertStatus(200);
    }
    public function testMethodActionUpdatePost()
    {
        $response = $this->setLogged()->get('admin/action-update-post/1');
        $response->assertStatus(405);
    }
}
