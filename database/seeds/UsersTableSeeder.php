<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\User\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{

    private $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

 
    public function run()
    {
        $this->userAdmin();
        factory(User::class,2)->create();
    }

    private function userAdmin()
    {
        $users = [
            ['name' => 'Administrador', 'email' => 'admin@guialocaliza.com.br', 'password' => 123456, 'admin' => true],
            ['name' => 'Editor', 'email' => 'editor@guialocaliza.com.br', 'password' => 123456],
        ];

        foreach ($users as $user) {
            $total = $this->user->where('email', $user['email'])->count();
            if ($total <= 0) {
                factory(User::class)->create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => bcrypt($user['password']),
                    'admin' => isset($user['admin']) ? $user['admin'] : false
                ]);
            }
        }

    }

}
