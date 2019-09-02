<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\User\UserRepository;
use Illuminate\Http\Request;

/**
 * Class AccountController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class AccountController extends BaseController
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * AccountController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Edit Account
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {

        $data = [];
        $data['user'] = $this->repository->find(\Auth::user()->id);
        return $this->view('account.edit', $data);

    }

    /**
     * Receive Post Change User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPost(Request $request)
    {
        
        $error = false;
        if(!validate_is_weak_password($request->input('password'))) {
            $error = true;
            $msg_error = 'Senha muito fraca!';
        }

        if(!validate_is_passwd($request->input('password'))) {
            $error = true;
            $msg_error = 'A senha deve conter no minímo 6 caracteres!';
        }

        if($request->input('password') !== $request->input('confirme')) {
            $error = true;
            $msg_error = 'As senhas não são iguais!';
        }

        if($error === true) {
            return redirect()
            ->route('admin.accounts.edit')
            ->with('error_message', $msg_error);
        }

        $data = [
            'name' => $request->input('name')
        ];

        if (!empty($request->input('password'))) {
            $data['password'] = $request->input('password');
        }

        $res = $this->repository->update(
            $data,
            \Auth::user()->id
        );

        if( $res ) {
            $success = true;
        }

        return redirect()
            ->route('admin.accounts.edit')
            ->with('success_edit', isset( $success ) ? $success : false);

    }

}
