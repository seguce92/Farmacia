<?php

namespace App\Http\Controllers;

use App\DataTables\CestadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCestadoRequest;
use App\Http\Requests\UpdateCestadoRequest;
use App\Repositories\CestadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CestadoController extends AppBaseController
{
    /** @var  CestadoRepository */
    private $cestadoRepository;

    public function __construct(CestadoRepository $cestadoRepo)
    {
        $this->middleware("auth");
        $this->cestadoRepository = $cestadoRepo;
    }

    /**
     * Display a listing of the Cestado.
     *
     * @param CestadoDataTable $cestadoDataTable
     * @return Response
     */
    public function index(CestadoDataTable $cestadoDataTable)
    {
        return $cestadoDataTable->render('cestados.index');
    }

    /**
     * Show the form for creating a new Cestado.
     *
     * @return Response
     */
    public function create()
    {
        return view('cestados.create');
    }

    /**
     * Store a newly created Cestado in storage.
     *
     * @param CreateCestadoRequest $request
     *
     * @return Response
     */
    public function store(CreateCestadoRequest $request)
    {
        $input = $request->all();

        $cestado = $this->cestadoRepository->create($input);

        Flash::success('Cestado saved successfully.');

        return redirect(route('cestados.index'));
    }

    /**
     * Display the specified Cestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cestado = $this->cestadoRepository->findWithoutFail($id);

        if (empty($cestado)) {
            Flash::error('Cestado not found');

            return redirect(route('cestados.index'));
        }

        return view('cestados.show')->with('cestado', $cestado);
    }

    /**
     * Show the form for editing the specified Cestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cestado = $this->cestadoRepository->findWithoutFail($id);

        if (empty($cestado)) {
            Flash::error('Cestado not found');

            return redirect(route('cestados.index'));
        }

        return view('cestados.edit')->with('cestado', $cestado);
    }

    /**
     * Update the specified Cestado in storage.
     *
     * @param  int              $id
     * @param UpdateCestadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCestadoRequest $request)
    {
        $cestado = $this->cestadoRepository->findWithoutFail($id);

        if (empty($cestado)) {
            Flash::error('Cestado not found');

            return redirect(route('cestados.index'));
        }

        $cestado = $this->cestadoRepository->update($request->all(), $id);

        Flash::success('Cestado updated successfully.');

        return redirect(route('cestados.index'));
    }

    /**
     * Remove the specified Cestado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cestado = $this->cestadoRepository->findWithoutFail($id);

        if (empty($cestado)) {
            Flash::error('Cestado not found');

            return redirect(route('cestados.index'));
        }

        $this->cestadoRepository->delete($id);

        Flash::success('Cestado deleted successfully.');

        return redirect(route('cestados.index'));
    }
}
