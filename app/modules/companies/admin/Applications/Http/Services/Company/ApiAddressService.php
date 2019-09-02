<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto\ApiCepAbertoRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

/**
 * Class ApiAddressService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 17/11/17
 * File: ApiAddressService.php
 */
class ApiAddressService
{

    /**
     * @var ApiCepAbertoRepository
     */
    private $apiCepAbertoRepository;
    /**
     * @var StateRepository
     */
    private $stateRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * ApiAddressService constructor.
     * @param ApiCepAbertoRepository $apiCepAbertoRepository
     * @param StateRepository $stateRepository
     * @param CityRepository $cityRepository
     */
    public function __construct(ApiCepAbertoRepository $apiCepAbertoRepository,
                                StateRepository $stateRepository,
                                CityRepository $cityRepository)
    {
        $this->apiCepAbertoRepository = $apiCepAbertoRepository;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
    }

    private function apiCepAberto(  $number  ) {
        return Curl::to('http://www.cepaberto.com/api/v2/ceps.json?cep=' .  $number )
            ->withHeader('Authorization: Token token=7413484fc4b1ee80e548e07714950ef7')
            ->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function address(Request $request)
    {

        $number = tools_only_numbers( $request->get('number') );

        if ($this->apiCepAbertoRepository->whereExists(['cep' =>  $number]) === true) {
            return $this->apiCepAbertoRepository->getAddressFull(['cep' =>  $number]);
        } else {

            $api = json_decode($this->apiCepAberto($number));

            if (isset($api->estado)) {

//                $state = $this->stateRepository->whereFirst(['abbr' => $api->estado]);
//                $city = $this->cityRepository->whereFirst(['state_id' => $state->id, 'name' => $api->cidade]);
//
//                $data = [];
//                $data['state_id'] = $state->id;
//                $data['state_name'] = $state->name;
//                $data['city_id'] = $city->id;
//                $data['city_name'] = $city->name;
//                $data['district'] = $api->bairro;
//                $data['place'] = $api->logradouro;
//
//                return $data;

                return [];

            }

        }

    }

}

