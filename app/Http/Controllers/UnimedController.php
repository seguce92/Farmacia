<?php

namespace App\Http\Controllers;

use App\DataTables\UnimedDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUnimedRequest;
use App\Http\Requests\UpdateUnimedRequest;
use App\Repositories\UnimedRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UnimedController extends AppBaseController
{
    /** @var  UnimedRepository */
    private $unimedRepository;

    public function __construct(UnimedRepository $unimedRepo)
    {
        $this->middleware("auth");
        $this->unimedRepository = $unimedRepo;
    }

    /**
     * Display a listing of the Unimed.
     *
     * @param UnimedDataTable $unimedDataTable
     * @return Response
     */
    public function index(UnimedDataTable $unimedDataTable)
    {
        return $unimedDataTable->render('unimeds.index');
    }

    /**
     * Show the form for creating a new Unimed.
     *
     * @return Response
     */
    public function create()
    {
        return view('unimeds.create');
    }

    /**
     * Store a newly created Unimed in storage.
     *
     * @param CreateUnimedRequest $request
     *
     * @return Response
     */
    public function store(CreateUnimedRequest $request)
    {
        $input = $request->all();

        $unimed = $this->unimedRepository->create($input);

        Flash::success('Unimed saved successfully.');

        return redirect(route('unimeds.index'));
    }

    /**
     * Display the specified Unimed.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unimed = $this->unimedRepository->findWithoutFail($id);

        if (empty($unimed)) {
            Flash::error('Unimed not found');

            return redirect(route('unimeds.index'));
        }

        return view('unimeds.show')->with('unimed', $unimed);
    }

    /**
     * Show the form for editing the specified Unimed.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unimed = $this->unimedRepository->findWithoutFail($id);

        if (empty($unimed)) {
            Flash::error('Unimed not found');

            return redirect(route('unimeds.index'));
        }

        return view('unimeds.edit')->with('unimed', $unimed);
    }

    /**
     * Update the specified Unimed in storage.
     *
     * @param  int              $id
     * @param UpdateUnimedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnimedRequest $request)
    {
        $unimed = $this->unimedRepository->findWithoutFail($id);

        if (empty($unimed)) {
            Flash::error('Unimed not found');

            return redirect(route('unimeds.index'));
        }

        $unimed = $this->unimedRepository->update($request->all(), $id);

        Flash::success('Unimed updated successfully.');

        return redirect(route('unimeds.index'));
    }

    /**
     * Remove the specified Unimed from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unimed = $this->unimedRepository->findWithoutFail($id);

        if (empty($unimed)) {
            Flash::error('Unimed not found');

            return redirect(route('unimeds.index'));
        }

        $this->unimedRepository->delete($id);

        Flash::success('Unimed deleted successfully.');

        return redirect(route('unimeds.index'));
    }
}
