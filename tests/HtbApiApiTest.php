<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HtbApiApiTest extends TestCase
{
    use MakeHtbApiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHtbApi()
    {
        $htbApi = $this->fakeHtbApiData();
        $this->json('POST', '/api/v1/htbApis', $htbApi);

        $this->assertApiResponse($htbApi);
    }

    /**
     * @test
     */
    public function testReadHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $this->json('GET', '/api/v1/htbApis/'.$htbApi->id);

        $this->assertApiResponse($htbApi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $editedHtbApi = $this->fakeHtbApiData();

        $this->json('PUT', '/api/v1/htbApis/'.$htbApi->id, $editedHtbApi);

        $this->assertApiResponse($editedHtbApi);
    }

    /**
     * @test
     */
    public function testDeleteHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $this->json('DELETE', '/api/v1/htbApis/'.$htbApi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/htbApis/'.$htbApi->id);

        $this->assertResponseStatus(404);
    }
}
