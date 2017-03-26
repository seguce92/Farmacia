<?php

use Faker\Factory as Faker;
use App\Models\CompraDetalle;
use App\Repositories\CompraDetalleRepository;

trait MakeCompraDetalleTrait
{
    /**
     * Create fake instance of CompraDetalle and save it in database
     *
     * @param array $compraDetalleFields
     * @return CompraDetalle
     */
    public function makeCompraDetalle($compraDetalleFields = [])
    {
        /** @var CompraDetalleRepository $compraDetalleRepo */
        $compraDetalleRepo = App::make(CompraDetalleRepository::class);
        $theme = $this->fakeCompraDetalleData($compraDetalleFields);
        return $compraDetalleRepo->create($theme);
    }

    /**
     * Get fake instance of CompraDetalle
     *
     * @param array $compraDetalleFields
     * @return CompraDetalle
     */
    public function fakeCompraDetalle($compraDetalleFields = [])
    {
        return new CompraDetalle($this->fakeCompraDetalleData($compraDetalleFields));
    }

    /**
     * Get fake data of CompraDetalle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCompraDetalleData($compraDetalleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'compra_id' => $fake->randomDigitNotNull,
            'item_id' => $fake->randomDigitNotNull,
            'cantidad' => $fake->word,
            'precion' => $fake->word,
            'descuento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $compraDetalleFields);
    }
}
