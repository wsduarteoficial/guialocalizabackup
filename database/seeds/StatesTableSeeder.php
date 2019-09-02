<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * @var State
     */
    private $state;

    /**
     * StatesTableSeeder constructor.
     * @param State $state
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $total = $this->state->count();

        $states = $this->states();

        if($total === count($states)) {
            return;
        }

        if($total <= 0) {

            foreach ($states as $state) {
                $this->state->create([
                    'id' => $state['id'],
                    'name' => $state['name'],
                    'abbr' => $state['abbr'],
                    'active' => ( $state['id'] == '13' ) ? true : false
                ]);
            }
            return;

        }



        foreach ($states as $state) {

            $total = $this->state->find($state['id'])->count();

            if ($total <= 0) {
                $this->state->create([
                    'id' => $state['id'],
                    'name' => $state['name'],
                    'abbr' => $state['abbr'],
                    'active' => ( $state['id'] == '13' ) ? true : false
                ]);
            }

        }

    }


    public function states()
    {

        return array(
            array('id' => '1','name' => 'Acre','abbr' => 'AC'),
            array('id' => '2','name' => 'Alagoas','abbr' => 'AL'),
            array('id' => '3','name' => 'Amazonas','abbr' => 'AM'),
            array('id' => '4','name' => 'Amapá','abbr' => 'AP'),
            array('id' => '5','name' => 'Bahia','abbr' => 'BA'),
            array('id' => '6','name' => 'Ceara','abbr' => 'CE'),
            array('id' => '7','name' => 'Distrito Federal','abbr' => 'DF'),
            array('id' => '8','name' => 'Espirito Santo','abbr' => 'ES'),
            array('id' => '9','name' => 'Goiás','abbr' => 'GO'),
            array('id' => '10','name' => 'Maranhão','abbr' => 'MA'),
            array('id' => '11','name' => 'Minas Gerais','abbr' => 'MG'),
            array('id' => '12','name' => 'Mato Grosso do Sul','abbr' => 'MS'),
            array('id' => '13','name' => 'Mato Grosso','abbr' => 'MT'),
            array('id' => '14','name' => 'Pará','abbr' => 'PA'),
            array('id' => '15','name' => 'Paraíba','abbr' => 'PB'),
            array('id' => '16','name' => 'Pernambuco','abbr' => 'PE'),
            array('id' => '17','name' => 'Piauí','abbr' => 'PI'),
            array('id' => '18','name' => 'Paraná','abbr' => 'PR'),
            array('id' => '19','name' => 'Rio de Janeiro','abbr' => 'RJ'),
            array('id' => '20','name' => 'Rio Grande do Norte','abbr' => 'RN'),
            array('id' => '21','name' => 'Rondônia','abbr' => 'RO'),
            array('id' => '22','name' => 'Roraima','abbr' => 'RR'),
            array('id' => '23','name' => 'Rio Grande do Sul','abbr' => 'RS'),
            array('id' => '24','name' => 'Santa Catarina','abbr' => 'SC'),
            array('id' => '25','name' => 'Sergipe','abbr' => 'SE'),
            array('id' => '26','name' => 'São Paulo','abbr' => 'SP'),
            array('id' => '27','name' => 'Tocantins','abbr' => 'TO')
        );

    }

}
