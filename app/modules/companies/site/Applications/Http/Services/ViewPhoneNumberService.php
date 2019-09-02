<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Phone\PhoneRepository;
use Illuminate\Http\Request;

/**
 * Class ViewPhoneNumberService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ViewPhoneNumberService
{
    /**
     * @var PhoneRepository
     */
    private $repository;

    /**
     * ToSeeService constructor.
     * @param PhoneRepository $repository
     */
    public function __construct(PhoneRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return array|mixed
     */
    public function viewPhoneNumber(Request $request)
    {

        $data = $this->repository->find($request->get('phone_id'));

        if (count($data)<=0) {
            return [];
        }

        if ($data->type === 'fixed') {
            $mask = tools_mask($data->number, '(##) ####-####');
            $number = sprintf("Tel.: %s", $mask);
        } elseif ($data->type === 'cell') {
            $mask = tools_mask($data->number, '(##) #-####-####');
            $number = sprintf("Cel.: %s", $mask);
        } else {
            $number = $data->number;
        }

        $array = [
            'number_mask' => $number,
            'number_type' => $data->type,
            'number_mobile' => '0' . tools_only_numbers($number)
        ];

        return $request->json('data', $array);

    }
}
