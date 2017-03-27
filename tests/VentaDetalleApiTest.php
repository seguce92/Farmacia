<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VentaDetalleApiTest extends TestCase
{
    use MakeVentaDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVentaDetalle()
    {
        $ventaDetalle = $this->fakeVentaDetalleData();
        $this->json('POST', '/api/v1/ventaDetalles', $ventaDetalle);

        $this->assertApiResponse($ventaDetalle);
    }

    /**
     * @test
     */
    public function testReadVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $this->json('GET', '/api/v1/ventaDetalles/'.$ventaDetalle->id);

        $this->assertApiResponse($ventaDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $editedVentaDetalle = $this->fakeVentaDetalleData();

        $this->json('PUT', '/api/v1/ventaDetalles/'.$ventaDetalle->id, $editedVentaDetalle);

        $this->assertApiResponse($editedVentaDetalle);
    }

    /**
     * @test
     */
    public function testDeleteVentaDetalle()
    {
        $ventaDetalle = $this->makeVentaDetalle();
        $this->json('DELETE', '/api/v1/ventaDetalles/'.$ventaDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ventaDetalles/'.$ventaDetalle->id);

        $this->assertResponseStatus(404);
    }
}
