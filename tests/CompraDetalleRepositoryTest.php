<?php

use App\Models\CompraDetalle;
use App\Repositories\CompraDetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompraDetalleRepositoryTest extends TestCase
{
    use MakeCompraDetalleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CompraDetalleRepository
     */
    protected $compraDetalleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->compraDetalleRepo = App::make(CompraDetalleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCompraDetalle()
    {
        $compraDetalle = $this->fakeCompraDetalleData();
        $createdCompraDetalle = $this->compraDetalleRepo->create($compraDetalle);
        $createdCompraDetalle = $createdCompraDetalle->toArray();
        $this->assertArrayHasKey('id', $createdCompraDetalle);
        $this->assertNotNull($createdCompraDetalle['id'], 'Created CompraDetalle must have id specified');
        $this->assertNotNull(CompraDetalle::find($createdCompraDetalle['id']), 'CompraDetalle with given id must be in DB');
        $this->assertModelData($compraDetalle, $createdCompraDetalle);
    }

    /**
     * @test read
     */
    public function testReadCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $dbCompraDetalle = $this->compraDetalleRepo->find($compraDetalle->id);
        $dbCompraDetalle = $dbCompraDetalle->toArray();
        $this->assertModelData($compraDetalle->toArray(), $dbCompraDetalle);
    }

    /**
     * @test update
     */
    public function testUpdateCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $fakeCompraDetalle = $this->fakeCompraDetalleData();
        $updatedCompraDetalle = $this->compraDetalleRepo->update($fakeCompraDetalle, $compraDetalle->id);
        $this->assertModelData($fakeCompraDetalle, $updatedCompraDetalle->toArray());
        $dbCompraDetalle = $this->compraDetalleRepo->find($compraDetalle->id);
        $this->assertModelData($fakeCompraDetalle, $dbCompraDetalle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $resp = $this->compraDetalleRepo->delete($compraDetalle->id);
        $this->assertTrue($resp);
        $this->assertNull(CompraDetalle::find($compraDetalle->id), 'CompraDetalle should not exist in DB');
    }
}
