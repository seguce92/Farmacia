<?php

namespace App\Http\Controllers;

use App\DataTables\FcategoriaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFcategoriaRequest;
use App\Http\Requests\UpdateFcategoriaRequest;
use App\Repositories\FcategoriaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FcategoriaController extends AppBaseController
{
    /** @var  FcategoriaRepository */
    private $fcategoriaRepository;

    public function __construct(FcategoriaRepository $fcategoriaRepo)
    {
        $this->fcategoriaRepository = $fcategoriaRepo;
    }

    /**
     * Display a listing of the Fcategoria.
     *
     * @param FcategoriaDataTable $fcategoriaDataTable
     * @return Response
     */
    public function index(FcategoriaDataTable $fcategoriaDataTable)
    {
        return $fcategoriaDataTable->render('fcategorias.index');
    }

    /**
     * Show the form for creating a new Fcategoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('fcategorias.create');
    }

    /**
     * Store a newly created Fcategoria in storage.
     *
     * @param CreateFcategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreateFcategoriaRequest $request)
    {
        $input = $request->all();

        $fcategoria = $this->fcategoriaRepository->create($input);

        Flash::success('Fcategoria saved successfully.');

        return redirect(route('fcategorias.index'));
    }

    /**
     * Display the specified Fcategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fcategoria = $this->fcategoriaRepository->findWithoutFail($id);

        if (empty($fcategoria)) {
            Flash::error('Fcategoria not found');

            return redirect(route('fcategorias.index'));
        }

        return view('fcategorias.show')->with('fcategoria', $fcategoria);
    }

    /**
     * Show the form for editing the specified Fcategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fcategoria = $this->fcategoriaRepository->findWithoutFail($id);

        if (empty($fcategoria)) {
            Flash::error('Fcategoria not found');

            return redirect(route('fcategorias.index'));
        }

        return view('fcategorias.edit')->with('fcategoria', $fcategoria);
    }

    /**
     * Update the specified Fcategoria in storage.
     *
     * @param  int              $id
     * @param UpdateFcategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFcategoriaRequest $request)
    {
        $fcategoria = $this->fcategoriaRepository->findWithoutFail($id);

        if (empty($fcategoria)) {
            Flash::error('Fcategoria not found');

            return redirect(route('fcategorias.index'));
        }

        $fcategoria = $this->fcategoriaRepository->update($request->all(), $id);

        Flash::success('Fcategoria updated successfully.');

        return redirect(route('fcategorias.index'));
    }

    /**
     * Remove the specified Fcategoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fcategoria = $this->fcategoriaRepository->findWithoutFail($id);

        if (empty($fcategoria)) {
            Flash::error('Fcategoria not found');

            return redirect(route('fcategorias.index'));
        }

        $this->fcategoriaRepository->delete($id);

        Flash::success('Fcategoria deleted successfully.');

        return redirect(route('fcategorias.index'));
    }
}
