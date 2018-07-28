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
        $this->withoutExceptionHandling();

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
     * Test updating an existing post from the edit form.
     */
    public function testUpdate()
    {
        $data = [
            'title' => 'An Updated Title',
            'body' => 'The body has been updated'
        ];

        $this->actingAs($this->user)
            ->patch("/post/{$this->existingPost->id}", $data)
            ->assertViewIs('post.show')
            ->assertSeeTextInOrder(array_values($data));
    }

    /**
     * Test loading existing post data into an edit form.
     */
    public function testEdit()
    {
        $this->actingAs($this->user)
            ->get("/post/{$this->existingPost->id}/edit")
            ->assertSuccessful()
            ->assertViewIs('post.edit')
            ->assertSeeTextInOrder([$this->existingPost->title, $this->existingPost->body]);
    }

    /**
     * Test deletion of a post from the database.
     */
    public function testDelete()
    {
        $postId = $this->existingPost['id'];

        // As authenticated user delete the existingPost object.
        $this->actingAs($this->user)
            ->delete("/post/{$postId}")
            ->assertSuccessful()
            ->assertViewIs('post.index');

        // TODO test when not authenticated.
        // TODO test 404 when id doesn't exist.
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
