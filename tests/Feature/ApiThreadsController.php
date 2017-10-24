<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiThreadsController extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowThreadsAPI()
    {

        $threads = factory(Thread::class, 10)->create();

        $response = $this->json('GET', '/api/threads');

        $response->assertSuccessful();

        $response->assertJsonStructure([[
            'id','name','created_at','updated_at'
        ]]);
    }

    public function testShowThreadAPI()
    {
        $this->withoutExceptionHandling();

        $thread = factory(Thread::class)->create();

        $response = $this->json('GET', '/api/threads/' . $thread->id);

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'id','name','created_at','updated_at'
        ]);

        $response->assertJson([
            'id' => $thread->id,
            'name' => $thread->name,
            'created_at' => $thread->created_at,
            'updated_at' => $thread->updated_at
        ]);
    }

    /**
     * TODO
     */
    public function testShowThreadsAPIAreBlank()
    {
        $response = $this->json('GET', '/api/threads');

        $response->assertSuccessful();
    }
}
