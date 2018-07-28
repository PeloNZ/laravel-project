<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;


class PostController extends TestCase
{
    use RefreshDatabase;

    private $user;

    private $existingPost;

    /**
     * Add a user and existing post.
     */
    public function setUp()
    {
        parent::setUp();

        // Enable this when debugging tests.
//        $this->withoutExceptionHandling();

        $this->user = factory(User::class)->create();

        $this->existingPost = factory(\App\Post::class)->create(['user_id' => $this->user->id]);
    }

    /**
     * Test the index page route
     */
    public function testIndex()
    {
        $this->get('/')
            ->assertSuccessful()
            ->assertViewIs('post.index');
    }

    /**
     * Test the view of a selected post.
     */
    public function testShow()
    {
        $this->get("/post/{$this->existingPost['id']}")
            ->assertViewIs('post.show')
            ->assertSeeText($this->existingPost->title)
            ->assertSeeText($this->existingPost->body)
            ->assertSeeText($this->existingPost->user->name);
    }

    /**
     * Test the Create form loads.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->actingAs($this->user)
            ->get('/post')
            ->assertViewIs('post.create')
            ->assertSeeTextInOrder(['Title', 'Body', 'Publish']);
    }

    /**
     * Save a post.
     */
    public function testStore()
    {
        $data = [
            'title' => 'test title',
            'body' => 'test body',
            'user_id' => $this->user->id
        ];

        $valid = $this->actingAs($this->user)
            ->post('/post', $data)
            ->assertRedirect('/');
    }
}
