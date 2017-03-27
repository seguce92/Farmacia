<?php

use Faker\Factory as Faker;
use App\Models\VentaDetalle;
use App\Repositories\VentaDetalleRepository;

trait MakeVentaDetalleTrait
{
    /**
     * Create fake instance of VentaDetalle and save it in database
     *
     * @param array $ventaDetalleFields
     * @return VentaDetalle
     */
    public function makeVentaDetalle($ventaDetalleFields = [])
    {
        /** @var VentaDetalleRepository $ventaDetalleRepo */
        $ventaDetalleRepo = App::make(VentaDetalleRepository::class);
        $theme = $this->fakeVentaDetalleData($ventaDetalleFields);
        return $ventaDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of VentaDetalle
     *
     * @param array $ventaDetalleFields
     * @return VentaDetalle
     */
    public function fakeVentaDetalle($ventaDetalleFields = [])
    {
        return new VentaDetalle($this->fakeVentaDetalleData($ventaDetalleFields));
    }

    /**
     * Get fake data of VentaDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVentaDetalleData($ventaDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'venta_id' => $fake->randomDigitNotNull,
            'item_id' => $fake->randomDigitNotNull,
            'cantidad' => $fake->word,
            'precio' => $fake->word,
            'descuento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $ventaDetalleFields);
    }
}
