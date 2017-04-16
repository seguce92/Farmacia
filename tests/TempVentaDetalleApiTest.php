<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempVentaDetalleApiTest extends TestCase
{
    use MakeTempVentaDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTempVentaDetalle()
    {
        $tempVentaDetalle = $this->fakeTempVentaDetalleData();
        $this->json('POST', '/api/v1/tempVentaDetalles', $tempVentaDetalle);

        $this->assertApiResponse($tempVentaDetalle);
    }

    /**
     * @test
     */
    public function testReadTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $this->json('GET', '/api/v1/tempVentaDetalles/'.$tempVentaDetalle->id);

        $this->assertApiResponse($tempVentaDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $editedTempVentaDetalle = $this->fakeTempVentaDetalleData();

        $this->json('PUT', '/api/v1/tempVentaDetalles/'.$tempVentaDetalle->id, $editedTempVentaDetalle);

        $this->assertApiResponse($editedTempVentaDetalle);
    }

    /**
     * @test
     */
    public function testDeleteTempVentaDetalle()
    {
        $tempVentaDetalle = $this->makeTempVentaDetalle();
        $this->json('DELETE', '/api/v1/tempVentaDetalles/'.$tempVentaDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tempVentaDetalles/'.$tempVentaDetalle->id);

        $this->assertResponseStatus(404);
    }
}
