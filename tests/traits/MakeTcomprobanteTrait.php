<?php

use Faker\Factory as Faker;
use App\Models\Tcomprobante;
use App\Repositories\TcomprobanteRepository;

trait MakeTcomprobanteTrait
{
    /**
     * Create fake instance of Tcomprobante and save it in database
     *
     * @param array $tcomprobanteFields
     * @return Tcomprobante
     */
    public function makeTcomprobante($tcomprobanteFields = [])
    {
        /** @var TcomprobanteRepository $tcomprobanteRepo */
        $tcomprobanteRepo = App::make(TcomprobanteRepository::class);
        $theme = $this->fakeTcomprobanteData($tcomprobanteFields);
        return $tcomprobanteRepo->create($theme);
    }

    /**
     * Get fake instance of Tcomprobante
     *
     * @param array $tcomprobanteFields
     * @return Tcomprobante
     */
    public function fakeTcomprobante($tcomprobanteFields = [])
    {
        return new Tcomprobante($this->fakeTcomprobanteData($tcomprobanteFields));
    }

    /**
     * Get fake data of Tcomprobante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTcomprobanteData($tcomprobanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descripcion' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tcomprobanteFields);
    }
}
