<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    /**
     * @var Plan
     */
    private $plan;

    /**
     * PlansTableSeeder constructor.
     * @param Plan $plan
     */
    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = $this->plans();

        foreach ($plans as $plan) {

            $total = $this->plan->where('name', $plan['name'])->count();
            if ($total <= 0) {
                $this->plan->create([
                    'name' => $plan['name'],
                    'value' => '0.00'
                ]);
            }

        }
    }

    public function plans()
    {

		return array(
			array('name' => 'Grátis'),
			array('name' => 'Bônus'),
            array('name' => 'Temporário'),
            array('name' => 'Patrocinado'),
		);

    }

}
