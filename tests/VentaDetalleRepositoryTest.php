<?php

use App\Models\VentaDetalle;
use App\Repositories\VentaDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VentaDetalleRepositoryTest extends TestCase
{
    use MakeVentaDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VentaDetalleRepository
     */
    protected $ventaDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ventaDetalleRepo = App::make(VentaDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVentaDetalle()
    {
        $ventaDetalle = $this->fakeVentaDetalleData();
        $createdVentaDetalle = $this->ventaDetalleRepo->create($ventaDetalle);
        $createdVentaDetalle = $createdVentaDetalle->toArray();
        $this->assertArrayHasKey('id', $createdVentaDetalle);
        $this->assertNotNull($createdVentaDetalle['id'], 'Created VentaDetalle must have id specified');
        $this->assertNotNull(VentaDetalle::find($createdVentaDetalle['id']), 'VentaDetalle with given id must be in DB');
        $this->assertModelData($ventaDetalle, $createdVentaDetalle);
    }

    /**
     * @test read
     */
    public function testReadVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $dbVentaDetalle = $this->ventaDetalleRepo->find($ventaDetalle->id);
        $dbVentaDetalle = $dbVentaDetalle->toArray();
        $this->assertModelData($ventaDetalle->toArray(), $dbVentaDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $fakeVentaDetalle = $this->fakeVentaDetalleData();
        $updatedVentaDetalle = $this->ventaDetalleRepo->update($fakeVentaDetalle, $ventaDetalle->id);
        $this->assertModelData($fakeVentaDetalle, $updatedVentaDetalle->toArray());
        $dbVentaDetalle = $this->ventaDetalleRepo->find($ventaDetalle->id);
        $this->assertModelData($fakeVentaDetalle, $dbVentaDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $resp = $this->ventaDetalleRepo->delete($ventaDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(VentaDetalle::find($ventaDetalle->id), 'VentaDetalle should not exist in DB');
    }
}
