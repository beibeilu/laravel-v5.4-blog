<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;
use App\Post;

class ExampleTest extends TestCase
{

    use DatabaseTransactions;   // Run the test through a transaction, rollback a transaction after running a test, no lingering records.

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        // $this->assertTrue(true);

        // Test the result of Post->archives() method.

        // Given - 2 posts from database 1 month apart

        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        // When - fetch archives

        $posts = Post::archives();

        // Then - result

        // dd($posts);
        $this->assertCount(2, $posts);
        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ]
        ], $posts);


    }
}
