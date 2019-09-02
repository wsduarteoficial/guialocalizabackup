<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto\ApiCepAberto;
use Illuminate\Database\Seeder;

class ApiCepAbertoTableSedeer extends Seeder
{

    private $arrayList = [
        'mt.cepaberto_parte_1',
        'mt.cepaberto_parte_2',
        'mt.cepaberto_parte_3',
        'mt.cepaberto_parte_4',
        'mt.cepaberto_parte_5',
    ];

    /**
     * @var ApiCepAberto
     */
    private $apiCepAberto;

    /**
     * ApiCepAbertoTableSedeer constructor.
     * @param ApiCepAberto $apiCepAberto
     */
    public function __construct(ApiCepAberto $apiCepAberto)
    {
        $this->apiCepAberto = $apiCepAberto;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $total = $this->apiCepAberto->count();
        
        if($total <= 0) {
            $this->apiCepAbertos();
        }
    }

    private function ApiCepAbertos()
    {

        foreach ($this->arrayList as $list) {            

            $csv = array_map('str_getcsv', file(database_path('/seeds/api-cep-aberto-csv/'. $list .'/'. $list .'.csv')));

            foreach ( $csv as $value) {

                if ($value[0]>=8) {
        
                    $this->apiCepAberto->create([
                        'cep' => $value[0],
                        'logradouro' => $value[1],
                        'bairro' => $value[2],
                        'cidade_id' => $value[3],
                        'estado_id' => $value[4]
                    ]);
                }

            }         

        }       

    }
    
}
