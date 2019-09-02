<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\User\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class UserController extends BaseController
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List All Users
     */
    public function listAll()
    {

        $data = [];
        $data['users'] = $this->repository->all();
        return $this->view('user.list')->with($data);

    }

    /**
     * View Form Create New User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('user.create');
    }

    /**
     * Register New User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPost(Request $request)
    {

        if (!$this->repository->whereExists(['email' => $request->input('email')])) {
            $this->repository->create($request->all());

            $success = true;
        }

        return redirect()
            ->route('admin.users.all')
            ->with('success_register', isset( $success ) ? $success : false);

    }


    /**
     * Edit User
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {

        $data = [];
        $data['user'] = $this->repository->find($request->route('id'));
        return $this->view('user.edit', $data);

    }

    /**
     * Receive Post Change User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPost(Request $request)
    {

        $dataExists = [
            'email' => $request->input('email'),
            'id' => $request->route('id')
        ];

        if (!$this->repository->existUserRegistered($dataExists)) {

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'admin' => $request->input('admin')
            ];

            if (validates_is_sha1($request->input('password'))) {
                unset($data['password']);
            }

            $res = $this->repository->update(
                $data,
                $request->route('id')
            );

            if( $res ) {
                $success = true;
            }

        }

        return redirect()
            ->route('admin.users.all')
            ->with('success_edit', isset( $success ) ? $success : false);

    }

}
