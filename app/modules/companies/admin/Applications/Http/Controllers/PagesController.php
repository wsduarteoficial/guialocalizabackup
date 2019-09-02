<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Page\PageRepository;
use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class PagesController extends BaseController
{

    /**
     * @var PageRepository
     */
    private $repository;

    /**
     * PagesController constructor.
     * @param PageRepository $repository
     */
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function pages()
    {
        $data = [];
        $data['pages'] = $this->repository->all();
        return $this->view('page.list')->with($data);

    }

    /**
     * @return $this
     */
    public function pagesEdit(Request $request)
    {
        $data = [];
        $data['page'] = $this->repository->find($request->route('id'));
        return $this->view('page.edit')->with($data);

    }

    /**
     * @return $this
     */
    public function pagesCreate()
    {
        $data = [];
        $data['pages'] = $this->repository->all();
        return $this->view('page.create')->with($data);

    }

    /**
     * @return $this
     */
    public function pagesRemove()
    {
        $data = [];
        $data['pages'] = $this->repository->all();
        return $this->view('page.list')->with($data);

    }


    public function pagesCreatePost(Request $request)
    {

        $res = $this->repository->create($request->all());

        if($res) {

            return redirect()
                ->route('admin.pages.all')
                ->with('success', 'Registro foram cadastros com sucesso!');

        }

        return redirect()
            ->route('admin.pages.all')
            ->with('error', 'Não foi possível cadastrar novo registro!');

    }


    public function pagesEditPost(Request $request)
    {

        $res = $this->repository->update($request->all(), $request->route('id'));

        if($res) {

            return redirect()
                ->route('admin.pages.all')
                ->with('success', 'Registros foram alterados com sucesso!');

        }

        return redirect()
                ->route('admin.pages.all')
                ->with('error', 'Não foi possível alterar os registros!');


    }

}
