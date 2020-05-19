<?php

use App\Models\HtbRest;
use App\Repositories\HtbRestRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HtbRestRepositoryTest extends TestCase
{
    use MakeHtbRestTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HtbRestRepository
     */
    protected $htbRestRepo;

    public function setUp()
    {
        parent::setUp();
        $this->htbRestRepo = App::make(HtbRestRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHtbRest()
    {
        $htbRest = $this->fakeHtbRestData();
        $createdHtbRest = $this->htbRestRepo->create($htbRest);
        $createdHtbRest = $createdHtbRest->toArray();
        $this->assertArrayHasKey('id', $createdHtbRest);
        $this->assertNotNull($createdHtbRest['id'], 'Created HtbRest must have id specified');
        $this->assertNotNull(HtbRest::find($createdHtbRest['id']), 'HtbRest with given id must be in DB');
        $this->assertModelData($htbRest, $createdHtbRest);
    }

    /**
     * @test read
     */
    public function testReadHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $dbHtbRest = $this->htbRestRepo->find($htbRest->id);
        $dbHtbRest = $dbHtbRest->toArray();
        $this->assertModelData($htbRest->toArray(), $dbHtbRest);
    }

    /**
     * @test update
     */
    public function testUpdateHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $fakeHtbRest = $this->fakeHtbRestData();
        $updatedHtbRest = $this->htbRestRepo->update($fakeHtbRest, $htbRest->id);
        $this->assertModelData($fakeHtbRest, $updatedHtbRest->toArray());
        $dbHtbRest = $this->htbRestRepo->find($htbRest->id);
        $this->assertModelData($fakeHtbRest, $dbHtbRest->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHtbRest()
    {
        $htbRest = $this->makeHtbRest();
        $resp = $this->htbRestRepo->delete($htbRest->id);
        $this->assertTrue($resp);
        $this->assertNull(HtbRest::find($htbRest->id), 'HtbRest should not exist in DB');
    }
}
