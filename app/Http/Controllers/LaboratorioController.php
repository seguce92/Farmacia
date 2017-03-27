<?php

namespace App\Http\Controllers;

use App\DataTables\LaboratorioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLaboratorioRequest;
use App\Http\Requests\UpdateLaboratorioRequest;
use App\Repositories\LaboratorioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LaboratorioController extends AppBaseController
{
    /** @var  LaboratorioRepository */
    private $laboratorioRepository;

    public function __construct(LaboratorioRepository $laboratorioRepo)
    {
        $this->laboratorioRepository = $laboratorioRepo;
    }

    /**
     * Display a listing of the Laboratorio.
     *
     * @param LaboratorioDataTable $laboratorioDataTable
     * @return Response
     */
    public function index(LaboratorioDataTable $laboratorioDataTable)
    {
        return $laboratorioDataTable->render('laboratorios.index');
    }

    /**
     * Show the form for creating a new Laboratorio.
     *
     * @return Response
     */
    public function create()
    {
        return view('laboratorios.create');
    }

    /**
     * Store a newly created Laboratorio in storage.
     *
     * @param CreateLaboratorioRequest $request
     *
     * @return Response
     */
    public function store(CreateLaboratorioRequest $request)
    {
        $input = $request->all();

        $laboratorio = $this->laboratorioRepository->create($input);

        Flash::success('Laboratorio saved successfully.');

        return redirect(route('laboratorios.index'));
    }

    /**
     * Display the specified Laboratorio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio)) {
            Flash::error('Laboratorio not found');

            return redirect(route('laboratorios.index'));
        }

        return view('laboratorios.show')->with('laboratorio', $laboratorio);
    }

    /**
     * Show the form for editing the specified Laboratorio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio)) {
            Flash::error('Laboratorio not found');

            return redirect(route('laboratorios.index'));
        }

        return view('laboratorios.edit')->with('laboratorio', $laboratorio);
    }

    /**
     * Update the specified Laboratorio in storage.
     *
     * @param  int              $id
     * @param UpdateLaboratorioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaboratorioRequest $request)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio)) {
            Flash::error('Laboratorio not found');

            return redirect(route('laboratorios.index'));
        }

        $laboratorio = $this->laboratorioRepository->update($request->all(), $id);

        Flash::success('Laboratorio updated successfully.');

        return redirect(route('laboratorios.index'));
    }

    /**
     * Remove the specified Laboratorio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio)) {
            Flash::error('Laboratorio not found');

            return redirect(route('laboratorios.index'));
        }

        $this->laboratorioRepository->delete($id);

        Flash::success('Laboratorio deleted successfully.');

        return redirect(route('laboratorios.index'));
    }
}
