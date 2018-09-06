<?php

namespace App\Http\Controllers;

use App\DataTables\UserVideosListDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserVideosListRequest;
use App\Http\Requests\UpdateUserVideosListRequest;
use App\Repositories\UserVideosListRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserVideosListController extends AppBaseController
{
    /** @var  UserVideosListRepository */
    private $userVideosListRepository;

    public function __construct(UserVideosListRepository $userVideosListRepo)
    {
        $this->userVideosListRepository = $userVideosListRepo;
    }

    /**
     * Display a listing of the UserVideosList.
     *
     * @param UserVideosListDataTable $userVideosListDataTable
     * @return Response
     */
    public function index(UserVideosListDataTable $userVideosListDataTable)
    {
        return $userVideosListDataTable->render('userVideosLists.index');
    }

    /**
     * Show the form for creating a new UserVideosList.
     *
     * @return Response
     */
    public function create()
    {
        return view('userVideosLists.create');
    }

    /**
     * Store a newly created UserVideosList in storage.
     *
     * @param CreateUserVideosListRequest $request
     *
     * @return Response
     */
    public function store(CreateUserVideosListRequest $request)
    {
        $input = $request->all();

        $userVideosList = $this->userVideosListRepository->create($input);

        Flash::success('User Videos List saved successfully.');

        return redirect(route('userVideosLists.index'));
    }

    /**
     * Display the specified UserVideosList.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userVideosList = $this->userVideosListRepository->findWithoutFail($id);

        if (empty($userVideosList)) {
            Flash::error('User Videos List not found');

            return redirect(route('userVideosLists.index'));
        }

        return view('userVideosLists.show')->with('userVideosList', $userVideosList);
    }

    /**
     * Show the form for editing the specified UserVideosList.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userVideosList = $this->userVideosListRepository->findWithoutFail($id);

        if (empty($userVideosList)) {
            Flash::error('User Videos List not found');

            return redirect(route('userVideosLists.index'));
        }

        return view('userVideosLists.edit')->with('userVideosList', $userVideosList);
    }

    /**
     * Update the specified UserVideosList in storage.
     *
     * @param  int              $id
     * @param UpdateUserVideosListRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserVideosListRequest $request)
    {
        $userVideosList = $this->userVideosListRepository->findWithoutFail($id);

        if (empty($userVideosList)) {
            Flash::error('User Videos List not found');

            return redirect(route('userVideosLists.index'));
        }

        $userVideosList = $this->userVideosListRepository->update($request->all(), $id);

        Flash::success('User Videos List updated successfully.');

        return redirect(route('userVideosLists.index'));
    }

    /**
     * Remove the specified UserVideosList from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userVideosList = $this->userVideosListRepository->findWithoutFail($id);

        if (empty($userVideosList)) {
            Flash::error('User Videos List not found');

            return redirect(route('userVideosLists.index'));
        }

        $this->userVideosListRepository->delete($id);

        Flash::success('User Videos List deleted successfully.');

        return redirect(route('userVideosLists.index'));
    }
}
