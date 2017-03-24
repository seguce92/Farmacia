<?php

namespace App\Http\Controllers;

use App\DataTables\IestadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIestadoRequest;
use App\Http\Requests\UpdateIestadoRequest;
use App\Repositories\IestadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IestadoController extends AppBaseController
{
    /** @var  IestadoRepository */
    private $iestadoRepository;

    public function __construct(IestadoRepository $iestadoRepo)
    {
        $this->middleware("auth");
        $this->iestadoRepository = $iestadoRepo;
    }

    /**
     * Display a listing of the Iestado.
     *
     * @param IestadoDataTable $iestadoDataTable
     * @return Response
     */
    public function index(IestadoDataTable $iestadoDataTable)
    {
        return $iestadoDataTable->render('iestados.index');
    }

    /**
     * Show the form for creating a new Iestado.
     *
     * @return Response
     */
    public function create()
    {
        return view('iestados.create');
    }

    /**
     * Store a newly created Iestado in storage.
     *
     * @param CreateIestadoRequest $request
     *
     * @return Response
     */
    public function store(CreateIestadoRequest $request)
    {
        $input = $request->all();

        $iestado = $this->iestadoRepository->create($input);

        Flash::success('Iestado saved successfully.');

        return redirect(route('iestados.index'));
    }

    /**
     * Display the specified Iestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $iestado = $this->iestadoRepository->findWithoutFail($id);

        if (empty($iestado)) {
            Flash::error('Iestado not found');

            return redirect(route('iestados.index'));
        }

        return view('iestados.show')->with('iestado', $iestado);
    }

    /**
     * Show the form for editing the specified Iestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $iestado = $this->iestadoRepository->findWithoutFail($id);

        if (empty($iestado)) {
            Flash::error('Iestado not found');

            return redirect(route('iestados.index'));
        }

        return view('iestados.edit')->with('iestado', $iestado);
    }

    /**
     * Update the specified Iestado in storage.
     *
     * @param  int              $id
     * @param UpdateIestadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIestadoRequest $request)
    {
        $iestado = $this->iestadoRepository->findWithoutFail($id);

        if (empty($iestado)) {
            Flash::error('Iestado not found');

            return redirect(route('iestados.index'));
        }

        $iestado = $this->iestadoRepository->update($request->all(), $id);

        Flash::success('Iestado updated successfully.');

        return redirect(route('iestados.index'));
    }

    /**
     * Remove the specified Iestado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $iestado = $this->iestadoRepository->findWithoutFail($id);

        if (empty($iestado)) {
            Flash::error('Iestado not found');

            return redirect(route('iestados.index'));
        }

        $this->iestadoRepository->delete($id);

        Flash::success('Iestado deleted successfully.');

        return redirect(route('iestados.index'));
    }
}
