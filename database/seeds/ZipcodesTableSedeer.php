<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\Zipcode;
use Illuminate\Database\Seeder;

class ZipcodesTableSedeer extends Seeder
{

    /**
     * @var Zipcode
     */
    private $zipcode;

    /**
     * ZipcodesTableSedeer constructor.
     * @param Zipcode $zipcode
     */
    public function __construct(Zipcode $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $total = $this->zipcode->count();
        $zipcodes = $this->zipcodes();

        if($total === count($zipcodes)) {
            return;
        }

        if($total <= 0) {

            foreach ($zipcodes as $zipcode) {
                $this->zipcode->create([
                    'id' => $zipcode['id'],
                    'city_id' => $zipcode['city_id'],
                    'code' => $zipcode['code'],
                    'active' => $zipcode['active']
                ]);
            }
            return;

        }

        foreach ($zipcodes as $zipcode) {

            $total = $this->zipcode->where('code', $zipcode['code'])->count();
            if ($total <= 0) {
                $this->zipcode->create([
                    'id' => $zipcode['id'],
                    'city_id' => $zipcode['city_id'],
                    'code' => $zipcode['code'],
                    'active' => $zipcode['active']
                ]);
            }
        }
    }

    private function zipcodes()
    {

        return array(
            array('id' => '2', 'city_id' => '2962', 'code' => '78400-000', 'active' => '1'),
            array('id' => '3', 'city_id' => '2962', 'code' => '78402-000', 'active' => '1'),
            array('id' => '4', 'city_id' => '647', 'code' => '78420-000', 'active' => '1'),
            array('id' => '5', 'city_id' => '936', 'code' => '78390-000', 'active' => '1'),
            array('id' => '6', 'city_id' => '6037', 'code' => '78460-000', 'active' => '1'),
            array('id' => '7', 'city_id' => '6184', 'code' => '78450-000', 'active' => '1'),
            array('id' => '8', 'city_id' => '6044', 'code' => '78430-000', 'active' => '1'),
            array('id' => '9', 'city_id' => '7898', 'code' => '78470-000', 'active' => '1'),
            array('id' => '10', 'city_id' => '9558', 'code' => '78300-000', 'active' => '1'),
            array('id' => '11', 'city_id' => '2932', 'code' => '78380-000', 'active' => '1'),
            array('id' => '12', 'city_id' => '8830', 'code' => '78435-000', 'active' => '1'),
            array('id' => '13', 'city_id' => '6177', 'code' => '78415-000', 'active' => '1'),
            array('id' => '14', 'city_id' => '6178', 'code' => '78445-000', 'active' => '1'),
            array('id' => '15', 'city_id' => '8340', 'code' => '78425-000', 'active' => '1'),
            array('id' => '16', 'city_id' => '1864', 'code' => '78360-000', 'active' => '1'),
            array('id' => '17', 'city_id' => '5212', 'code' => '78455-000', 'active' => '1'),
            array('id' => '18', 'city_id' => '6187', 'code' => '78370-000', 'active' => '1'),
            array('id' => '19', 'city_id' => '9157', 'code' => '78365-000', 'active' => '1'),
            array('id' => '20', 'city_id' => '9451', 'code' => '78890-000', 'active' => '1'),
            array('id' => '21', 'city_id' => '283', 'code' => '78410-000', 'active' => '1'),
            array('id' => '22', 'city_id' => '1453', 'code' => '78350-000', 'active' => '1'),
            array('id' => '24', 'city_id' => '8273', 'code' => '78453-000', 'active' => '1'),
            array('id' => '25', 'city_id' => '5109011', 'code' => '78452-970', 'active' => '1'),
            array('id' => '26', 'city_id' => '9451', 'code' => '78890000', 'active' => '1'),
            array('id' => '27', 'city_id' => '2962', 'code' => '78400-971', 'active' => '0')
        );

    }
    
}
