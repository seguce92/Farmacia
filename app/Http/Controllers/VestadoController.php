<?php

namespace App\Http\Controllers;

use App\DataTables\VestadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVestadoRequest;
use App\Http\Requests\UpdateVestadoRequest;
use App\Repositories\VestadoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VestadoController extends AppBaseController
{
    /** @var  VestadoRepository */
    private $vestadoRepository;

    public function __construct(VestadoRepository $vestadoRepo)
    {
        $this->vestadoRepository = $vestadoRepo;
    }

    /**
     * Display a listing of the Vestado.
     *
     * @param VestadoDataTable $vestadoDataTable
     * @return Response
     */
    public function index(VestadoDataTable $vestadoDataTable)
    {
        return $vestadoDataTable->render('vestados.index');
    }

    /**
     * Show the form for creating a new Vestado.
     *
     * @return Response
     */
    public function create()
    {
        return view('vestados.create');
    }

    /**
     * Store a newly created Vestado in storage.
     *
     * @param CreateVestadoRequest $request
     *
     * @return Response
     */
    public function store(CreateVestadoRequest $request)
    {
        $input = $request->all();

        $vestado = $this->vestadoRepository->create($input);

        Flash::success('Vestado saved successfully.');

        return redirect(route('vestados.index'));
    }

    /**
     * Display the specified Vestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vestado = $this->vestadoRepository->findWithoutFail($id);

        if (empty($vestado)) {
            Flash::error('Vestado not found');

            return redirect(route('vestados.index'));
        }

        return view('vestados.show')->with('vestado', $vestado);
    }

    /**
     * Show the form for editing the specified Vestado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vestado = $this->vestadoRepository->findWithoutFail($id);

        if (empty($vestado)) {
            Flash::error('Vestado not found');

            return redirect(route('vestados.index'));
        }

        return view('vestados.edit')->with('vestado', $vestado);
    }

    /**
     * Update the specified Vestado in storage.
     *
     * @param  int              $id
     * @param UpdateVestadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVestadoRequest $request)
    {
        $vestado = $this->vestadoRepository->findWithoutFail($id);

        if (empty($vestado)) {
            Flash::error('Vestado not found');

            return redirect(route('vestados.index'));
        }

        $vestado = $this->vestadoRepository->update($request->all(), $id);

        Flash::success('Vestado updated successfully.');

        return redirect(route('vestados.index'));
    }

    /**
     * Remove the specified Vestado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vestado = $this->vestadoRepository->findWithoutFail($id);

        if (empty($vestado)) {
            Flash::error('Vestado not found');

            return redirect(route('vestados.index'));
        }

        $this->vestadoRepository->delete($id);

        Flash::success('Vestado deleted successfully.');

        return redirect(route('vestados.index'));
    }
}
