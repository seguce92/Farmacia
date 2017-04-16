<?php

use Faker\Factory as Faker;
use App\Models\TempVentaDetalle;
use App\Repositories\TempVentaDetalleRepository;

trait MakeTempVentaDetalleTrait
{
    /**
     * Create fake instance of TempVentaDetalle and save it in database
     *
     * @param array $tempVentaDetalleFields
     * @return TempVentaDetalle
     */
    public function makeTempVentaDetalle($tempVentaDetalleFields = [])
    {
        /** @var TempVentaDetalleRepository $tempVentaDetalleRepo */
        $tempVentaDetalleRepo = App::make(TempVentaDetalleRepository::class);
        $theme = $this->fakeTempVentaDetalleData($tempVentaDetalleFields);
        return $tempVentaDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of TempVentaDetalle
     *
     * @param array $tempVentaDetalleFields
     * @return TempVentaDetalle
     */
    public function fakeTempVentaDetalle($tempVentaDetalleFields = [])
    {
        return new TempVentaDetalle($this->fakeTempVentaDetalleData($tempVentaDetalleFields));
    }

    /**
     * Get fake data of TempVentaDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTempVentaDetalleData($tempVentaDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'temp_venta_id' => $fake->randomDigitNotNull,
            'item_id' => $fake->randomDigitNotNull,
            'cantidad' => $fake->word,
            'precio' => $fake->word,
            'descuento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $tempVentaDetalleFields);
    }
}
