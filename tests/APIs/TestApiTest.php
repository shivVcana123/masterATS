<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Test;

class TestApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_test()
    {
        $test = Test::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tests', $test
        );

        $this->assertApiResponse($test);
    }

    /**
     * @test
     */
    public function test_read_test()
    {
        $test = Test::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tests/'.$test->id
        );

        $this->assertApiResponse($test->toArray());
    }

    /**
     * @test
     */
    public function test_update_test()
    {
        $test = Test::factory()->create();
        $editedTest = Test::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tests/'.$test->id,
            $editedTest
        );

        $this->assertApiResponse($editedTest);
    }

    /**
     * @test
     */
    public function test_delete_test()
    {
        $test = Test::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tests/'.$test->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tests/'.$test->id
        );

        $this->response->assertStatus(404);
    }
}
