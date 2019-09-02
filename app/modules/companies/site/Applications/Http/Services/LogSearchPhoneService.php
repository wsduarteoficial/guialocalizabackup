<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogSearchRepository;
use Illuminate\Http\Request;

/**
 * Class LogSearchPhoneService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class LogSearchPhoneService
{
    /**
     * @var LogSearchRepository
     */

    private $repository;

    /**
     * @var Request
     */
    private $request;

    /**
     * LogSearchPhoneService constructor.
     * @param Request $request
     * @param LogSearchRepository $repository
     */
    public function __construct(Request $request, LogSearchRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @param array $data
     */
    public function LogSearch(array $data)
    {

        $search = tools_sanitize_search($data['search']);

        if ($this->repository->dataEqualsPerIp($data['search'], $this->request->ip())) {
            return false;
        }

        $dataInsert = [
            'tag_search' => $search,
            'total' => isset( $data['total'] ) ? $data['total'] : 0,
            'url' => $this->request->fullUrl(),
            'method' => $this->request->method(),
            'ip' =>  $this->request->ip(),
            'agent' => $this->request->header('User-Agent'),
            'state_id' => isset( $data['state_id'] ) ? $data['state_id'] : null,
            'city_id'  => isset( $data['city_id'] ) ? $data['city_id'] : null,
            'category_id' => isset( $data['category_id'] ) ? $data['category_id'] : null,
            'subcategory_id' => isset( $data['subcategory_id'] ) ? $data['subcategory_id'] : null,
        ];

        return $this->repository->create($dataInsert);

    }

}
