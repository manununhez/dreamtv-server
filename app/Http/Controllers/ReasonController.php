<?php

namespace App\Http\Controllers;

use App\DataTables\ReasonDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReasonRequest;
use App\Http\Requests\UpdateReasonRequest;
use App\Repositories\ReasonRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReasonController extends AppBaseController
{
    /** @var  ReasonRepository */
    private $reasonRepository;

    public function __construct(ReasonRepository $reasonRepo)
    {
        $this->reasonRepository = $reasonRepo;
    }

    /**
     * Display a listing of the Reason.
     *
     * @param ReasonDataTable $reasonDataTable
     * @return Response
     */
    public function index(ReasonDataTable $reasonDataTable)
    {
        return $reasonDataTable->render('reasons.index');
    }

    /**
     * Show the form for creating a new Reason.
     *
     * @return Response
     */
    public function create()
    {
        return view('reasons.create');
    }

    /**
     * Store a newly created Reason in storage.
     *
     * @param CreateReasonRequest $request
     *
     * @return Response
     */
    public function store(CreateReasonRequest $request)
    {
        $input = $request->all();

        $reason = $this->reasonRepository->create($input);

        Flash::success('Reason saved successfully.');

        return redirect(route('reasons.index'));
    }

    /**
     * Display the specified Reason.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reason = $this->reasonRepository->findWithoutFail($id);

        if (empty($reason)) {
            Flash::error('Reason not found');

            return redirect(route('reasons.index'));
        }

        return view('reasons.show')->with('reason', $reason);
    }

    /**
     * Show the form for editing the specified Reason.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reason = $this->reasonRepository->findWithoutFail($id);

        if (empty($reason)) {
            Flash::error('Reason not found');

            return redirect(route('reasons.index'));
        }

        return view('reasons.edit')->with('reason', $reason);
    }

    /**
     * Update the specified Reason in storage.
     *
     * @param  int              $id
     * @param UpdateReasonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReasonRequest $request)
    {
        $reason = $this->reasonRepository->findWithoutFail($id);

        if (empty($reason)) {
            Flash::error('Reason not found');

            return redirect(route('reasons.index'));
        }

        $reason = $this->reasonRepository->update($request->all(), $id);

        Flash::success('Reason updated successfully.');

        return redirect(route('reasons.index'));
    }

    /**
     * Remove the specified Reason from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reason = $this->reasonRepository->findWithoutFail($id);

        if (empty($reason)) {
            Flash::error('Reason not found');

            return redirect(route('reasons.index'));
        }

        $this->reasonRepository->delete($id);

        Flash::success('Reason deleted successfully.');

        return redirect(route('reasons.index'));
    }
}
