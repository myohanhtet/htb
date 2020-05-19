<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HtbRestApiTest extends TestCase
{
    use MakeHtbRestTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHtbRest()
    {
        $htbRest = $this->fakeHtbRestData();
        $this->json('POST', '/api/v1/htbRests', $htbRest);

        $this->assertApiResponse($htbRest);
    }

    /**
     * @test
     */
    public function testReadHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $this->json('GET', '/api/v1/htbRests/'.$htbRest->id);

        $this->assertApiResponse($htbRest->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $editedHtbRest = $this->fakeHtbRestData();

        $this->json('PUT', '/api/v1/htbRests/'.$htbRest->id, $editedHtbRest);

        $this->assertApiResponse($editedHtbRest);
    }

    /**
     * @test
     */
    public function testDeleteHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $this->json('DELETE', '/api/v1/htbRests/'.$htbRest->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/htbRests/'.$htbRest->id);

        $this->assertResponseStatus(404);
    }
}
