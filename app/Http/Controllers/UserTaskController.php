<?php

namespace App\Http\Controllers;

use App\DataTables\UserTaskDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserTaskRequest;
use App\Http\Requests\UpdateUserTaskRequest;
use App\Repositories\UserTaskRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserTaskController extends AppBaseController
{
    /** @var  UserTaskRepository */
    private $userTaskRepository;

    public function __construct(UserTaskRepository $userTaskRepo)
    {
        $this->userTaskRepository = $userTaskRepo;
    }

    /**
     * Display a listing of the UserTask.
     *
     * @param UserTaskDataTable $userTaskDataTable
     * @return Response
     */
    public function index(UserTaskDataTable $userTaskDataTable)
    {
        return $userTaskDataTable->render('userTasks.index');
    }

    /**
     * Show the form for creating a new UserTask.
     *
     * @return Response
     */
    public function create()
    {
        return view('userTasks.create');
    }

    /**
     * Store a newly created UserTask in storage.
     *
     * @param CreateUserTaskRequest $request
     *
     * @return Response
     */
    public function store(CreateUserTaskRequest $request)
    {
        $input = $request->all();

        $userTask = $this->userTaskRepository->create($input);

        Flash::success('User Task saved successfully.');

        return redirect(route('userTasks.index'));
    }

    /**
     * Display the specified UserTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userTask = $this->userTaskRepository->findWithoutFail($id);

        if (empty($userTask)) {
            Flash::error('User Task not found');

            return redirect(route('userTasks.index'));
        }

        return view('userTasks.show')->with('userTask', $userTask);
    }

    /**
     * Show the form for editing the specified UserTask.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userTask = $this->userTaskRepository->findWithoutFail($id);

        if (empty($userTask)) {
            Flash::error('User Task not found');

            return redirect(route('userTasks.index'));
        }

        return view('userTasks.edit')->with('userTask', $userTask);
    }

    /**
     * Update the specified UserTask in storage.
     *
     * @param  int              $id
     * @param UpdateUserTaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserTaskRequest $request)
    {
        $userTask = $this->userTaskRepository->findWithoutFail($id);

        if (empty($userTask)) {
            Flash::error('User Task not found');

            return redirect(route('userTasks.index'));
        }

        $userTask = $this->userTaskRepository->update($request->all(), $id);

        Flash::success('User Task updated successfully.');

        return redirect(route('userTasks.index'));
    }

    /**
     * Remove the specified UserTask from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userTask = $this->userTaskRepository->findWithoutFail($id);

        if (empty($userTask)) {
            Flash::error('User Task not found');

            return redirect(route('userTasks.index'));
        }

        $this->userTaskRepository->delete($id);

        Flash::success('User Task deleted successfully.');

        return redirect(route('userTasks.index'));
    }
}
