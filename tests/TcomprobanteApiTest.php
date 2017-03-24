<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TcomprobanteApiTest extends TestCase
{
    use MakeTcomprobanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTcomprobante()
    {
        $tcomprobante = $this->fakeTcomprobanteData();
        $this->json('POST', '/api/v1/tcomprobantes', $tcomprobante);

        $this->assertApiResponse($tcomprobante);
    }

    /**
     * @test
     */
    public function testReadTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $this->json('GET', '/api/v1/tcomprobantes/'.$tcomprobante->id);

        $this->assertApiResponse($tcomprobante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $editedTcomprobante = $this->fakeTcomprobanteData();

        $this->json('PUT', '/api/v1/tcomprobantes/'.$tcomprobante->id, $editedTcomprobante);

        $this->assertApiResponse($editedTcomprobante);
    }

    /**
     * @test
     */
    public function testDeleteTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $this->json('DELETE', '/api/v1/tcomprobantes/'.$tcomprobante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tcomprobantes/'.$tcomprobante->id);

        $this->assertResponseStatus(404);
    }
}
