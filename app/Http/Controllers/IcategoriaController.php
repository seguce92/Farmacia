<?php

namespace App\Http\Controllers;

use App\DataTables\IcategoriaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIcategoriaRequest;
use App\Http\Requests\UpdateIcategoriaRequest;
use App\Repositories\IcategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IcategoriaController extends AppBaseController
{
    /** @var  IcategoriaRepository */
    private $icategoriaRepository;

    public function __construct(IcategoriaRepository $icategoriaRepo)
    {
        $this->middleware("auth");
        $this->icategoriaRepository = $icategoriaRepo;
    }

    /**
     * Display a listing of the Icategoria.
     *
     * @param IcategoriaDataTable $icategoriaDataTable
     * @return Response
     */
    public function index(IcategoriaDataTable $icategoriaDataTable)
    {
        return $icategoriaDataTable->render('icategorias.index');
    }

    /**
     * Show the form for creating a new Icategoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('icategorias.create');
    }

    /**
     * Store a newly created Icategoria in storage.
     *
     * @param CreateIcategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateIcategoriaRequest $request)
    {
        $input = $request->all();

        $icategoria = $this->icategoriaRepository->create($input);

        Flash::success('Icategoria saved successfully.');

        return redirect(route('icategorias.index'));
    }

    /**
     * Display the specified Icategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $icategoria = $this->icategoriaRepository->findWithoutFail($id);

        if (empty($icategoria)) {
            Flash::error('Icategoria not found');

            return redirect(route('icategorias.index'));
        }

        return view('icategorias.show')->with('icategoria', $icategoria);
    }

    /**
     * Show the form for editing the specified Icategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $icategoria = $this->icategoriaRepository->findWithoutFail($id);

        if (empty($icategoria)) {
            Flash::error('Icategoria not found');

            return redirect(route('icategorias.index'));
        }

        return view('icategorias.edit')->with('icategoria', $icategoria);
    }

    /**
     * Update the specified Icategoria in storage.
     *
     * @param  int              $id
     * @param UpdateIcategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIcategoriaRequest $request)
    {
        $icategoria = $this->icategoriaRepository->findWithoutFail($id);

        if (empty($icategoria)) {
            Flash::error('Icategoria not found');

            return redirect(route('icategorias.index'));
        }

        $icategoria = $this->icategoriaRepository->update($request->all(), $id);

        Flash::success('Icategoria updated successfully.');

        return redirect(route('icategorias.index'));
    }

    /**
     * Remove the specified Icategoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $icategoria = $this->icategoriaRepository->findWithoutFail($id);

        if (empty($icategoria)) {
            Flash::error('Icategoria not found');

            return redirect(route('icategorias.index'));
        }

        $this->icategoriaRepository->delete($id);

        Flash::success('Icategoria deleted successfully.');

        return redirect(route('icategorias.index'));
    }
}
