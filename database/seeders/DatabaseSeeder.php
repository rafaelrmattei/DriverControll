<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\City;
use App\Models\Expense;
use App\Models\Route;
use App\Models\RouteExpense;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {

        UserType::create([
            'name' => 'Administrador'
        ]);
        UserType::create([
            'name' => 'Motorista'
        ]);
        UserType::create([
            'name' => 'Gerente'
        ]);

        User::create([
            'name'         => 'Julio Turcatto',
            'email'        => 'julio.turcatto',
            'password'     => bcrypt('@123turcatto'),
            'user_type_id' => 1
        ]);

        User::create([
            'name'         => 'Gustavo Vilela',
            'email'        => 'gustavo.vilela',
            'password'     => bcrypt('@vilela123'),
            'user_type_id' => 1
        ]);

        Expense::create([
            'name' => 'Diesel',
            'type' => 'L'
        ]);
        Expense::create([
            'name' => 'Borracharia',
            'type' => 'R$'
        ]);
        Expense::create([
            'name' => 'Peças',
            'type' => 'R$'
        ]);
        Expense::create([
            'name' => 'Elétrica',
            'type' => 'R$'
        ]);
        Expense::create([
            'name' => 'Troca de pneu dianteiro',
            'type' => 'R$'
        ]);
        Expense::create([
            'name' => 'Troca de pneu traseiro',
            'type' => 'R$'
        ]);

    }

}
