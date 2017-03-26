<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompraDetalleApiTest extends TestCase
{
    use MakeCompraDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCompraDetalle()
    {
        $compraDetalle = $this->fakeCompraDetalleData();
        $this->json('POST', '/api/v1/compraDetalles', $compraDetalle);

        $this->assertApiResponse($compraDetalle);
    }

    /**
     * @test
     */
    public function testReadCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $this->json('GET', '/api/v1/compraDetalles/'.$compraDetalle->id);

        $this->assertApiResponse($compraDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $editedCompraDetalle = $this->fakeCompraDetalleData();

        $this->json('PUT', '/api/v1/compraDetalles/'.$compraDetalle->id, $editedCompraDetalle);

        $this->assertApiResponse($editedCompraDetalle);
    }

    /**
     * @test
     */
    public function testDeleteCompraDetalle()
    {
        $compraDetalle = $this->makeCompraDetalle();
        $this->json('DELETE', '/api/v1/compraDetalles/'.$compraDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/compraDetalles/'.$compraDetalle->id);

        $this->assertResponseStatus(404);
    }
}
