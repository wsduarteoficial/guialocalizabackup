<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Setting\SettingRepository;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\LogoService;
use Illuminate\Http\Request;

/**
 * Class SettingController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class SettingController extends BaseController
{

    /**
     * @var SettingRepository
     */
    private $repository;

    private $logoService;

    public function __construct(SettingRepository $repository,
                                LogoService $logoService)
    {
        $this->repository = $repository;
        $this->logoService = $logoService;
    }


    /**
     * @return $this
     */
    public function socials()
    {
        $data = [];
        $data['settings'] = $this->repository->find(1);
        return $this->view('setting.socials-list')->with($data);

    }


    public function socialsPost(Request $request)
    {

        $data = [
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'google' => $request->input('google'),
            'instagram' => $request->input('instagram')
        ];

        if($this->repository->find(1))
            $this->repository->update($data, 1);
        else
            $this->repository->create($data);

        return redirect()
            ->route('admin.settings.socials')
            ->with('success_register', true);

    }


    /**
     * @return $this
     */
    public function logos()
    {
        $data = [];
        $data['logos'] = $this->repository->all();
        return $this->view('logo.list')->with($data);
    }

    public function logosPost(Request $request)
    {
        return $this->logoService->uploads($request);
    }

}
