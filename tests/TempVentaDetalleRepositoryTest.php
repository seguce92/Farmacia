<?php

use App\Models\TempVentaDetalle;
use App\Repositories\TempVentaDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempVentaDetalleRepositoryTest extends TestCase
{
    use MakeTempVentaDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TempVentaDetalleRepository
     */
    protected $tempVentaDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tempVentaDetalleRepo = App::make(TempVentaDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTempVentaDetalle()
    {
        $tempVentaDetalle = $this->fakeTempVentaDetalleData();
        $createdTempVentaDetalle = $this->tempVentaDetalleRepo->create($tempVentaDetalle);
        $createdTempVentaDetalle = $createdTempVentaDetalle->toArray();
        $this->assertArrayHasKey('id', $createdTempVentaDetalle);
        $this->assertNotNull($createdTempVentaDetalle['id'], 'Created TempVentaDetalle must have id specified');
        $this->assertNotNull(TempVentaDetalle::find($createdTempVentaDetalle['id']), 'TempVentaDetalle with given id must be in DB');
        $this->assertModelData($tempVentaDetalle, $createdTempVentaDetalle);
    }

    /**
     * @test read
     */
    public function testReadTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $dbTempVentaDetalle = $this->tempVentaDetalleRepo->find($tempVentaDetalle->id);
        $dbTempVentaDetalle = $dbTempVentaDetalle->toArray();
        $this->assertModelData($tempVentaDetalle->toArray(), $dbTempVentaDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $fakeTempVentaDetalle = $this->fakeTempVentaDetalleData();
        $updatedTempVentaDetalle = $this->tempVentaDetalleRepo->update($fakeTempVentaDetalle, $tempVentaDetalle->id);
        $this->assertModelData($fakeTempVentaDetalle, $updatedTempVentaDetalle->toArray());
        $dbTempVentaDetalle = $this->tempVentaDetalleRepo->find($tempVentaDetalle->id);
        $this->assertModelData($fakeTempVentaDetalle, $dbTempVentaDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $resp = $this->tempVentaDetalleRepo->delete($tempVentaDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(TempVentaDetalle::find($tempVentaDetalle->id), 'TempVentaDetalle should not exist in DB');
    }
}
