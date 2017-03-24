<?php

use App\Models\Tcomprobante;
use App\Repositories\TcomprobanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TcomprobanteRepositoryTest extends TestCase
{
    use MakeTcomprobanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TcomprobanteRepository
     */
    protected $tcomprobanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tcomprobanteRepo = App::make(TcomprobanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTcomprobante()
    {
        $tcomprobante = $this->fakeTcomprobanteData();
        $createdTcomprobante = $this->tcomprobanteRepo->create($tcomprobante);
        $createdTcomprobante = $createdTcomprobante->toArray();
        $this->assertArrayHasKey('id', $createdTcomprobante);
        $this->assertNotNull($createdTcomprobante['id'], 'Created Tcomprobante must have id specified');
        $this->assertNotNull(Tcomprobante::find($createdTcomprobante['id']), 'Tcomprobante with given id must be in DB');
        $this->assertModelData($tcomprobante, $createdTcomprobante);
    }

    /**
     * @test read
     */
    public function testReadTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $dbTcomprobante = $this->tcomprobanteRepo->find($tcomprobante->id);
        $dbTcomprobante = $dbTcomprobante->toArray();
        $this->assertModelData($tcomprobante->toArray(), $dbTcomprobante);
    }

    /**
     * @test update
     */
    public function testUpdateTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $fakeTcomprobante = $this->fakeTcomprobanteData();
        $updatedTcomprobante = $this->tcomprobanteRepo->update($fakeTcomprobante, $tcomprobante->id);
        $this->assertModelData($fakeTcomprobante, $updatedTcomprobante->toArray());
        $dbTcomprobante = $this->tcomprobanteRepo->find($tcomprobante->id);
        $this->assertModelData($fakeTcomprobante, $dbTcomprobante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTcomprobante()
    {
        $tcomprobante = $this->makeTcomprobante();
        $resp = $this->tcomprobanteRepo->delete($tcomprobante->id);
        $this->assertTrue($resp);
        $this->assertNull(Tcomprobante::find($tcomprobante->id), 'Tcomprobante should not exist in DB');
    }
}
