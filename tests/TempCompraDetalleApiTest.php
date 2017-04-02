<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TempCompraDetalleApiTest extends TestCase
{
    use MakeTempCompraDetalleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTempCompraDetalle()
    {
        $tempCompraDetalle = $this->fakeTempCompraDetalleData();
        $this->json('POST', '/api/v1/tempCompraDetalles', $tempCompraDetalle);

        $this->assertApiResponse($tempCompraDetalle);
    }

    /**
     * @test
     */
    public function testReadTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $this->json('GET', '/api/v1/tempCompraDetalles/'.$tempCompraDetalle->id);

        $this->assertApiResponse($tempCompraDetalle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $editedTempCompraDetalle = $this->fakeTempCompraDetalleData();

        $this->json('PUT', '/api/v1/tempCompraDetalles/'.$tempCompraDetalle->id, $editedTempCompraDetalle);

        $this->assertApiResponse($editedTempCompraDetalle);
    }

    /**
     * @test
     */
    public function testDeleteTempCompraDetalle()
    {
        $tempCompraDetalle = $this->makeTempCompraDetalle();
        $this->json('DELETE', '/api/v1/tempCompraDetalles/'.$tempCompraDetalle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tempCompraDetalles/'.$tempCompraDetalle->id);

        $this->assertResponseStatus(404);
    }
}
