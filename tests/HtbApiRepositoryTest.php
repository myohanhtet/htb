<?php

use App\Models\HtbApi;
use App\Repositories\HtbApiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HtbApiRepositoryTest extends TestCase
{
    use MakeHtbApiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HtbApiRepository
     */
    protected $htbApiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->htbApiRepo = App::make(HtbApiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHtbApi()
    {
        $htbApi = $this->fakeHtbApiData();
        $createdHtbApi = $this->htbApiRepo->create($htbApi);
        $createdHtbApi = $createdHtbApi->toArray();
        $this->assertArrayHasKey('id', $createdHtbApi);
        $this->assertNotNull($createdHtbApi['id'], 'Created HtbApi must have id specified');
        $this->assertNotNull(HtbApi::find($createdHtbApi['id']), 'HtbApi with given id must be in DB');
        $this->assertModelData($htbApi, $createdHtbApi);
    }

    /**
     * @test read
     */
    public function testReadHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $dbHtbApi = $this->htbApiRepo->find($htbApi->id);
        $dbHtbApi = $dbHtbApi->toArray();
        $this->assertModelData($htbApi->toArray(), $dbHtbApi);
    }

    /**
     * @test update
     */
    public function testUpdateHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $fakeHtbApi = $this->fakeHtbApiData();
        $updatedHtbApi = $this->htbApiRepo->update($fakeHtbApi, $htbApi->id);
        $this->assertModelData($fakeHtbApi, $updatedHtbApi->toArray());
        $dbHtbApi = $this->htbApiRepo->find($htbApi->id);
        $this->assertModelData($fakeHtbApi, $dbHtbApi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHtbApi()
    {
        $htbApi = $this->makeHtbApi();
        $resp = $this->htbApiRepo->delete($htbApi->id);
        $this->assertTrue($resp);
        $this->assertNull(HtbApi::find($htbApi->id), 'HtbApi should not exist in DB');
    }
}
