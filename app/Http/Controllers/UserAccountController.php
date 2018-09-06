<?php

namespace App\Http\Controllers;

use App\DataTables\UserAccountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserAccountRequest;
use App\Http\Requests\UpdateUserAccountRequest;
use App\Repositories\UserAccountRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UserAccountController extends AppBaseController
{
    /** @var  UserAccountRepository */
    private $userAccountRepository;

    public function __construct(UserAccountRepository $userAccountRepo)
    {
        $this->userAccountRepository = $userAccountRepo;
    }

    /**
     * Display a listing of the UserAccount.
     *
     * @param UserAccountDataTable $userAccountDataTable
     * @return Response
     */
    public function index(UserAccountDataTable $userAccountDataTable)
    {
        return $userAccountDataTable->render('userAccounts.index');
    }

    /**
     * Show the form for creating a new UserAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('userAccounts.create');
    }

    /**
     * Store a newly created UserAccount in storage.
     *
     * @param CreateUserAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAccountRequest $request)
    {
        $input = $request->all();

        $userAccount = $this->userAccountRepository->create($input);

        Flash::success('User Account saved successfully.');

        return redirect(route('userAccounts.index'));
    }

    /**
     * Display the specified UserAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userAccount = $this->userAccountRepository->findWithoutFail($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        return view('user_accounts.show')->with('userAccount', $userAccount);
    }

    /**
     * Show the form for editing the specified UserAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userAccount = $this->userAccountRepository->findWithoutFail($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        return view('user_accounts.edit')->with('userAccount', $userAccount);
    }

    /**
     * Update the specified UserAccount in storage.
     *
     * @param  int              $id
     * @param UpdateUserAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAccountRequest $request)
    {
        $userAccount = $this->userAccountRepository->findWithoutFail($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        $userAccount = $this->userAccountRepository->update($request->all(), $id);

        Flash::success('User Account updated successfully.');

        return redirect(route('userAccounts.index'));
    }

    /**
     * Remove the specified UserAccount from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userAccount = $this->userAccountRepository->findWithoutFail($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        $this->userAccountRepository->delete($id);

        Flash::success('User Account deleted successfully.');

        return redirect(route('userAccounts.index'));
    }
}
