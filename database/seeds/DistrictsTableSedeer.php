<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\District\District;
use Illuminate\Database\Seeder;

/**
 * Class DistrictsTableSedeer
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Databases\Seeds
 */
class DistrictsTableSedeer extends Seeder
{
    /**
     * @var District
     */
    private $district;

    /**
     * DistrictsTableSedeer constructor.
     * @param District $district
     */
    public function __construct(District $district)
    {
        $this->district = $district;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $total = $this->district->count();
        $districts = $this->districts();

        if($total === count($districts)) {
            return;
        }

        if($total <= 0) {

            foreach ($districts as $district) {

                $this->district->create([
                    'id' => $district['id'],
                    'city_id' => $district['city_id'],
                    'name' => $district['name'],
                    'active' => true,
                ]);

            }
            return;

        }

        foreach ($districts as $district) {

            $total = $this->district->where('name', $district['name'])->count();
            if ($total <= 0) {
                $this->district->create([
                    'id' => $district['id'],
                    'city_id' => $district['city_id'],
                    'name' => $district['name'],
                    'active' => true,
                ]);
            }

        }

        return;

    }

    /**
     * Array Bairros
     */
    private function districts()
    {

        return array(
            array('id' => '1', 'city_id' => '2962', 'name' => 'Centro'),
            array('id' => '4', 'city_id' => '9558', 'name' => 'Jd. Paraíso'),
            array('id' => '5', 'city_id' => '9558', 'name' => 'Parque das Mansões'),
            array('id' => '6', 'city_id' => '9558', 'name' => 'Jd. São Cristovão'),
            array('id' => '10', 'city_id' => '9558', 'name' => 'Jd. Tapirapuã'),
            array('id' => '11', 'city_id' => '9558', 'name' => 'Jd. Eldorado'),
            array('id' => '12', 'city_id' => '9558', 'name' => 'Jd. Santiago'),
            array('id' => '13', 'city_id' => '9558', 'name' => 'Jd. Shangri-lá'),
            array('id' => '14', 'city_id' => '9558', 'name' => 'Jd. Mirante'),
            array('id' => '15', 'city_id' => '9558', 'name' => 'Jd. do Lago'),
            array('id' => '16', 'city_id' => '9558', 'name' => 'Zona Rural'),
            array('id' => '17', 'city_id' => '9558', 'name' => 'Vila São Pedro'),
            array('id' => '18', 'city_id' => '9558', 'name' => 'Jd. Parati'),
            array('id' => '19', 'city_id' => '2962', 'name' => 'Da Ponte'),
            array('id' => '20', 'city_id' => '2962', 'name' => 'Conceição'),
            array('id' => '21', 'city_id' => '2962', 'name' => 'Bom Jesus'),
            array('id' => '22', 'city_id' => '2962', 'name' => 'Alvorada'),
            array('id' => '23', 'city_id' => '2962', 'name' => 'Pedregal'),
            array('id' => '24', 'city_id' => '2962', 'name' => 'Popino'),
            array('id' => '25', 'city_id' => '2962', 'name' => 'Buriti'),
            array('id' => '26', 'city_id' => '2962', 'name' => 'Cohab Morumbi'),
            array('id' => '27', 'city_id' => '2962', 'name' => 'Jd. Guaraná'),
            array('id' => '28', 'city_id' => '2962', 'name' => 'Parque Everest'),
            array('id' => '29', 'city_id' => '2962', 'name' => 'Vale do Sol'),
            array('id' => '30', 'city_id' => '2962', 'name' => 'Novo Diamantino'),
            array('id' => '33', 'city_id' => '9558', 'name' => 'Jd. Aeroporto'),
            array('id' => '34', 'city_id' => '9558', 'name' => 'Vila Esmeralda'),
            array('id' => '35', 'city_id' => '9558', 'name' => 'Jd. dos Ipês'),
            array('id' => '36', 'city_id' => '9558', 'name' => 'Vila Portuguesa'),
            array('id' => '37', 'city_id' => '9558', 'name' => 'Jd. Tangará II'),
            array('id' => '38', 'city_id' => '9558', 'name' => 'Jd. Primavera'),
            array('id' => '39', 'city_id' => '9558', 'name' => 'Jd. Califórnia'),
            array('id' => '40', 'city_id' => '9558', 'name' => 'Vila Alta III'),
            array('id' => '41', 'city_id' => '9558', 'name' => 'Jd. Europa'),
            array('id' => '42', 'city_id' => '9558', 'name' => 'Vila Alta'),
            array('id' => '43', 'city_id' => '9558', 'name' => 'Jd. Olímpico'),
            array('id' => '44', 'city_id' => '9558', 'name' => 'Jd. do Lago II'),
            array('id' => '45', 'city_id' => '9558', 'name' => 'Jd. Tarumã'),
            array('id' => '47', 'city_id' => '9558', 'name' => 'Gleba Jutinho'),
            array('id' => '48', 'city_id' => '9558', 'name' => 'Jd. Itália'),
            array('id' => '49', 'city_id' => '9558', 'name' => 'Jd. Tangará I'),
            array('id' => '50', 'city_id' => '9558', 'name' => 'Jd. San Diego'),
            array('id' => '51', 'city_id' => '9558', 'name' => 'Jd. Amélia'),
            array('id' => '52', 'city_id' => '9558', 'name' => 'Jd. Acacia'),
            array('id' => '53', 'city_id' => '9558', 'name' => 'Jd. Sul'),
            array('id' => '54', 'city_id' => '9558', 'name' => 'Jd. do Sul'),
            array('id' => '55', 'city_id' => '9558', 'name' => 'Jd. Planalto'),
            array('id' => '56', 'city_id' => '9558', 'name' => 'Nova Londrina'),
            array('id' => '57', 'city_id' => '9558', 'name' => 'Santa Terezinha'),
            array('id' => '58', 'city_id' => '9558', 'name' => 'Royal Parque'),
            array('id' => '60', 'city_id' => '9558', 'name' => 'Vila Goiania'),
            array('id' => '61', 'city_id' => '9558', 'name' => 'Jd. Urapuru'),
            array('id' => '62', 'city_id' => '9558', 'name' => 'Jd. Araputanga'),
            array('id' => '63', 'city_id' => '9558', 'name' => 'Parque Leblon'),
            array('id' => '64', 'city_id' => '9558', 'name' => 'Altos do Tarumã'),
            array('id' => '65', 'city_id' => '9558', 'name' => 'Jd. América'),
            array('id' => '66', 'city_id' => '9558', 'name' => 'Vila Horizonte'),
            array('id' => '67', 'city_id' => '9558', 'name' => 'Jd. N. S. Aparecida'),
            array('id' => '68', 'city_id' => '9558', 'name' => 'Prédio Univida'),
            array('id' => '70', 'city_id' => '9558', 'name' => 'Cohab Tarumã'),
            array('id' => '71', 'city_id' => '9558', 'name' => 'Jd. Santa Lucia'),
            array('id' => '72', 'city_id' => '9558', 'name' => 'Jd. Rio Preto'),
            array('id' => '73', 'city_id' => '9558', 'name' => 'Jd. Tanaka '),
            array('id' => '74', 'city_id' => '9558', 'name' => 'Alto Boa Vista'),
            array('id' => '75', 'city_id' => '9558', 'name' => 'Vila Santa Fé'),
            array('id' => '76', 'city_id' => '9558', 'name' => 'Cidade Alta'),
            array('id' => '77', 'city_id' => '9558', 'name' => 'Jd. Cristo Rei'),
            array('id' => '79', 'city_id' => '9558', 'name' => 'Rodoviária'),
            array('id' => '81', 'city_id' => '9558', 'name' => 'Dona Julia '),
            array('id' => '82', 'city_id' => '9558', 'name' => 'Jd. Industrial'),
            array('id' => '83', 'city_id' => '9558', 'name' => 'Vila Alta I'),
            array('id' => '84', 'city_id' => '9558', 'name' => 'Jd. São Rafael'),
            array('id' => '86', 'city_id' => '9558', 'name' => 'Vila Araputanga'),
            array('id' => '87', 'city_id' => '9558', 'name' => 'Cohab'),
            array('id' => '89', 'city_id' => '9558', 'name' => 'Novo Tarumã'),
            array('id' => '90', 'city_id' => '9558', 'name' => 'Distrito de Progresso'),
            array('id' => '92', 'city_id' => '9558', 'name' => 'Vila Esmeralda II'),
            array('id' => '93', 'city_id' => '9558', 'name' => 'Jd. Santa Fé'),
            array('id' => '94', 'city_id' => '9558', 'name' => 'Cidade Alta II'),
            array('id' => '98', 'city_id' => '2962', 'name' => 'Posto Gil'),
            array('id' => '99', 'city_id' => '2962', 'name' => 'Distrito de Deciolândia'),
            array('id' => '100', 'city_id' => '6178', 'name' => 'Distrito de Brianorte'),
            array('id' => '101', 'city_id' => '9558', 'name' => 'Vila Santa Izabel'),
            array('id' => '102', 'city_id' => '9558', 'name' => 'Vila Nazaré'),
            array('id' => '103', 'city_id' => '9558', 'name' => 'Vila Santa Lúcia'),
            array('id' => '104', 'city_id' => '9558', 'name' => 'Tangará Shopping'),
            array('id' => '105', 'city_id' => '9558', 'name' => 'Jd. Atlântida'),
            array('id' => '106', 'city_id' => '9558', 'name' => 'Jd. Alto Alegre'),
            array('id' => '107', 'city_id' => '9558', 'name' => 'Jd. Presidente'),
            array('id' => '108', 'city_id' => '9558', 'name' => 'Zona Urbana'),
            array('id' => '109', 'city_id' => '2962', 'name' => 'São Benedito'),
            array('id' => '110', 'city_id' => '9558', 'name' => 'Jd. Paulista'),
            array('id' => '115', 'city_id' => '6187', 'name' => 'Ouro Verde'),
            array('id' => '116', 'city_id' => '6187', 'name' => 'Jd. São João'),
            array('id' => '117', 'city_id' => '6187', 'name' => 'Jd. do Ouro'),
            array('id' => '118', 'city_id' => '6187', 'name' => 'Vila Alvorada'),
            array('id' => '120', 'city_id' => '6177', 'name' => 'Bairro Planalto II')
        );

    }
}
