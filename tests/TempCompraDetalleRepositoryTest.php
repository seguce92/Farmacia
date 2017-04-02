<?php

use App\Models\TempCompraDetalle;
use App\Repositories\TempCompraDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempCompraDetalleRepositoryTest extends TestCase
{
    use MakeTempCompraDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TempCompraDetalleRepository
     */
    protected $tempCompraDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tempCompraDetalleRepo = App::make(TempCompraDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTempCompraDetalle()
    {
        $tempCompraDetalle = $this->fakeTempCompraDetalleData();
        $createdTempCompraDetalle = $this->tempCompraDetalleRepo->create($tempCompraDetalle);
        $createdTempCompraDetalle = $createdTempCompraDetalle->toArray();
        $this->assertArrayHasKey('id', $createdTempCompraDetalle);
        $this->assertNotNull($createdTempCompraDetalle['id'], 'Created TempCompraDetalle must have id specified');
        $this->assertNotNull(TempCompraDetalle::find($createdTempCompraDetalle['id']), 'TempCompraDetalle with given id must be in DB');
        $this->assertModelData($tempCompraDetalle, $createdTempCompraDetalle);
    }

    /**
     * @test read
     */
    public function testReadTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $dbTempCompraDetalle = $this->tempCompraDetalleRepo->find($tempCompraDetalle->id);
        $dbTempCompraDetalle = $dbTempCompraDetalle->toArray();
        $this->assertModelData($tempCompraDetalle->toArray(), $dbTempCompraDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $fakeTempCompraDetalle = $this->fakeTempCompraDetalleData();
        $updatedTempCompraDetalle = $this->tempCompraDetalleRepo->update($fakeTempCompraDetalle, $tempCompraDetalle->id);
        $this->assertModelData($fakeTempCompraDetalle, $updatedTempCompraDetalle->toArray());
        $dbTempCompraDetalle = $this->tempCompraDetalleRepo->find($tempCompraDetalle->id);
        $this->assertModelData($fakeTempCompraDetalle, $dbTempCompraDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $resp = $this->tempCompraDetalleRepo->delete($tempCompraDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(TempCompraDetalle::find($tempCompraDetalle->id), 'TempCompraDetalle should not exist in DB');
    }
}
