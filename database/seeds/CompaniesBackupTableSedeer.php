<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use Illuminate\Database\Seeder;

class CompaniesBackupTableSedeer extends Seeder
{

    private $company;

    private $category;

    private $subcategory;

    private $phone;

    /**
     * CompaniesTableSedeer constructor.
     * @param Company $company
     * @param Category $category
     * @param Subcategory $subcategory
     * @param PhoneRepository $phone
     */
    public function __construct(CompanyRepository $company,
                                CategoryRepository $category,
                                SubcategoryRepository $subcategory,
                                PhoneRepository $phone)
    {
        $this->company = $company;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->phone = $phone;
    }

    private function clearField($value = null)
    {       
        return isset($value) && !empty( $value ) ? $value : null;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        include( database_path( '/seeds/backup_empresa/backupDataEmpresa.php' ) );

        foreach ($arrayListBackup as $list) {

            $exists = $this->company->whereExists(['id' =>  $list['id']]);

            $contains = str_contains($list['name'], ['AGRUPADO', 'Agrupado', 'agrupado']);

            $array_data = [
                
                'id' => $list['id'],
                'company_uuid' => Uuid::generate()->string,
                'plan_id' => 1,
                'state_id' => $this->clearField( $list['estado_id'] ),
                'city_id' => $this->clearField( $list['cidade_id'] ),
                'zipcode_id' => $this->clearField( $list['cep_id'] ),
                'place_id' => $this->clearField( $list['logradouro_id'] ),
                'district_id' => $this->clearField( $list['bairro_id'] ),
                'name_fantasy' => $this->clearField( $list['name'] ),
                'description' => $this->clearField( $list['description'] ),
                'numeral' => $this->clearField( $list['numero'] ),
                'website' => $this->clearField( $list['website'] ),
                'email' => $this->clearField( $list['email'] ),
                'facebook' => $this->clearField( $list['facebook'] ),
                'twitter' => $this->clearField( $list['twitter'] ),
                'google' => $this->clearField( $list['google'] ),
                'tags' => $this->clearField( $list['tags'] ),
                'active' => $contains === true ? false : true 

            ];

            if( $exists === false ) {
                
                $company = $this->company->create($array_data);

                if (!empty( $list['categoria_id'] ) && $list['categoria_id'] > 0) {
                    
                    $category = $this->category->find($list['categoria_id']);

                    if(isset($category) && $category->id > 0) {

                        $category->companies()->attach($company->id);
                    
                    } else {

                        $category = $this->category->find( 478 );
                        $category->companies()->attach($company->id);
                    
                    }

                } else {
                   
                    $category = $this->category->find( 478 );
                    $category->companies()->attach($company->id);

                }

                if (!empty($list['subcategoria_id']) && $list['subcategoria_id'] > 0) {
                    
                    $subcategory = $this->subcategory->find( $list['subcategoria_id'] );
                    if(isset($subcategory) && $subcategory->id > 0) {
                        $subcategory->companies()->attach($company->id);
                    }
                }

                $collection = collect([]);

                if(!empty($list['phone1'])) {
                    
                    $array_phone1 = [
                        'phone' => tools_only_numbers($list['phone1']),
                        'type' => 'cell',
                    ];

                    $collection->push($array_phone1);

                }

                if(!empty($list['phone2'])) {

                    $array_phone2 = [
                        'phone' => tools_only_numbers( $list['phone2'] ),
                        'type' => 'fixed',
                    ];

                    $collection->push($array_phone2);

                }
       
                foreach ($collection->all() as $value) {
                    
                    if (preg_match('#^\d{2}[6789]\d{3}\d{4}$#', $value['phone']) > 0) {
                        
                        $type = 'cell';
                        $ddd = substr($value['phone'], 0, 2);
                        $number = $ddd . 9 . substr($value['phone'], 2, 8);  // eu não sou besta 
                    
                    } else {

                        $type = 'fixed';
                        $number = $value['phone'];

                    }

                    if( !empty( $number ) ) {

                        $phone = $this->phone->create([
                            'number' => $number,
                            'type' => $type
                        ]);

                    }

                    $company->phones()->attach($phone->id);

                }               

            }

        }

    }

}
