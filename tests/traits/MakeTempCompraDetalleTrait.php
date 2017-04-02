<?php

use Faker\Factory as Faker;
use App\Models\TempCompraDetalle;
use App\Repositories\TempCompraDetalleRepository;

trait MakeTempCompraDetalleTrait
{
    /**
     * Create fake instance of TempCompraDetalle and save it in database
     *
     * @param array $tempCompraDetalleFields
     * @return TempCompraDetalle
     */
    public function makeTempCompraDetalle($tempCompraDetalleFields = [])
    {
        /** @var TempCompraDetalleRepository $tempCompraDetalleRepo */
        $tempCompraDetalleRepo = App::make(TempCompraDetalleRepository::class);
        $theme = $this->fakeTempCompraDetalleData($tempCompraDetalleFields);
        return $tempCompraDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of TempCompraDetalle
     *
     * @param array $tempCompraDetalleFields
     * @return TempCompraDetalle
     */
    public function fakeTempCompraDetalle($tempCompraDetalleFields = [])
    {
        return new TempCompraDetalle($this->fakeTempCompraDetalleData($tempCompraDetalleFields));
    }

    /**
     * Get fake data of TempCompraDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTempCompraDetalleData($tempCompraDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'temp_compra_id' => $fake->randomDigitNotNull,
            'item_id' => $fake->randomDigitNotNull,
            'cantidad' => $fake->word,
            'precio' => $fake->word,
            'descuento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $tempCompraDetalleFields);
    }
}
