<?php

namespace App\Http\Controllers;

use App\DataTables\TcomprobanteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTcomprobanteRequest;
use App\Http\Requests\UpdateTcomprobanteRequest;
use App\Repositories\TcomprobanteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TcomprobanteController extends AppBaseController
{
    /** @var  TcomprobanteRepository */
    private $tcomprobanteRepository;

    public function __construct(TcomprobanteRepository $tcomprobanteRepo)
    {
        $this->middleware('auth');
        $this->tcomprobanteRepository = $tcomprobanteRepo;
    }

    /**
     * Display a listing of the Tcomprobante.
     *
     * @param TcomprobanteDataTable $tcomprobanteDataTable
     * @return Response
     */
    public function index(TcomprobanteDataTable $tcomprobanteDataTable)
    {
        return $tcomprobanteDataTable->render('tcomprobantes.index');
    }

    /**
     * Show the form for creating a new Tcomprobante.
     *
     * @return Response
     */
    public function create()
    {
        return view('tcomprobantes.create');
    }

    /**
     * Store a newly created Tcomprobante in storage.
     *
     * @param CreateTcomprobanteRequest $request
     *
     * @return Response
     */
    public function store(CreateTcomprobanteRequest $request)
    {
        $input = $request->all();

        $tcomprobante = $this->tcomprobanteRepository->create($input);

        Flash::success('Tcomprobante saved successfully.');

        return redirect(route('tcomprobantes.index'));
    }

    /**
     * Display the specified Tcomprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            Flash::error('Tcomprobante not found');

            return redirect(route('tcomprobantes.index'));
        }

        return view('tcomprobantes.show')->with('tcomprobante', $tcomprobante);
    }

    /**
     * Show the form for editing the specified Tcomprobante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            Flash::error('Tcomprobante not found');

            return redirect(route('tcomprobantes.index'));
        }

        return view('tcomprobantes.edit')->with('tcomprobante', $tcomprobante);
    }

    /**
     * Update the specified Tcomprobante in storage.
     *
     * @param  int              $id
     * @param UpdateTcomprobanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTcomprobanteRequest $request)
    {
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            Flash::error('Tcomprobante not found');

            return redirect(route('tcomprobantes.index'));
        }

        $tcomprobante = $this->tcomprobanteRepository->update($request->all(), $id);

        Flash::success('Tcomprobante updated successfully.');

        return redirect(route('tcomprobantes.index'));
    }

    /**
     * Remove the specified Tcomprobante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tcomprobante = $this->tcomprobanteRepository->findWithoutFail($id);

        if (empty($tcomprobante)) {
            Flash::error('Tcomprobante not found');

            return redirect(route('tcomprobantes.index'));
        }

        $this->tcomprobanteRepository->delete($id);

        Flash::success('Tcomprobante deleted successfully.');

        return redirect(route('tcomprobantes.index'));
    }
}
