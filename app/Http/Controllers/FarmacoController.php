<?php

namespace App\Http\Controllers;

use App\DataTables\FarmacoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFarmacoRequest;
use App\Http\Requests\UpdateFarmacoRequest;
use App\Models\Fcategoria;
use App\Repositories\FarmacoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FarmacoController extends AppBaseController
{
    /** @var  FarmacoRepository */
    private $farmacoRepository;

    public function __construct(FarmacoRepository $farmacoRepo)
    {
        $this->farmacoRepository = $farmacoRepo;
    }

    /**
     * Display a listing of the Farmaco.
     *
     * @param FarmacoDataTable $farmacoDataTable
     * @return Response
     */
    public function index(FarmacoDataTable $farmacoDataTable)
    {
        return $farmacoDataTable->render('farmacos.index');
    }

    /**
     * Show the form for creating a new Farmaco.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Fcategoria::pluck('nombre','id')->toArray();
        return view('farmacos.create',compact('categorias'));
    }

    /**
     * Store a newly created Farmaco in storage.
     *
     * @param CreateFarmacoRequest $request
     *
     * @return Response
     */
    public function store(CreateFarmacoRequest $request)
    {
        $input = $request->all();

//        dd($input);

        $farmaco = $this->farmacoRepository->create($input);

        Flash::success('Farmaco saved successfully.');

        return redirect(route('farmacos.index'));
    }

    /**
     * Display the specified Farmaco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $farmaco = $this->farmacoRepository->findWithoutFail($id);

        if (empty($farmaco)) {
            Flash::error('Farmaco not found');

            return redirect(route('farmacos.index'));
        }

        return view('farmacos.show')->with('farmaco', $farmaco);
    }

    /**
     * Show the form for editing the specified Farmaco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $farmaco = $this->farmacoRepository->findWithoutFail($id);

        if (empty($farmaco)) {
            Flash::error('Farmaco not found');

            return redirect(route('farmacos.index'));
        }

        $categorias = Fcategoria::pluck('nombre','id')->toArray();

        return view('farmacos.edit',compact('farmaco','categorias'));
    }

    /**
     * Update the specified Farmaco in storage.
     *
     * @param  int              $id
     * @param UpdateFarmacoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFarmacoRequest $request)
    {
        $farmaco = $this->farmacoRepository->findWithoutFail($id);

        if (empty($farmaco)) {
            Flash::error('Farmaco not found');

            return redirect(route('farmacos.index'));
        }

        $farmaco = $this->farmacoRepository->update($request->all(), $id);

        Flash::success('Farmaco updated successfully.');

        return redirect(route('farmacos.index'));
    }

    /**
     * Remove the specified Farmaco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $farmaco = $this->farmacoRepository->findWithoutFail($id);

        if (empty($farmaco)) {
            Flash::error('Farmaco not found');

            return redirect(route('farmacos.index'));
        }

        $this->farmacoRepository->delete($id);

        Flash::success('Farmaco deleted successfully.');

        return redirect(route('farmacos.index'));
    }
}
