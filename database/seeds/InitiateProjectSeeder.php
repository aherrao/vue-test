<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitiateProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrMixInsertData = [];
        $arrMixInsertData['client_id'] = 1;
        $arrMixInsertData['profile_id'] = 1;
        $arrMixInsertData['name'] = 'swapnil';
        $arrMixInsertData['email'] = 'swapnil.1512@gmail.com';
        $arrMixInsertData['is_admin'] = true;
        $arrMixInsertData['password'] = bcrypt('admin');

        DB::table('users')->insert($arrMixInsertData);

        $arrMixInsertData = [];
        $arrMixInsertData['name'] = 'BullScript Technologies';
        $arrMixInsertData['sub_domain'] = 'admin';
        $arrMixInsertData['client_type_id'] = 4;
        $arrMixInsertData['created_by'] = 1;
        $arrMixInsertData['updated_by'] = 1;

        DB::table('clients')->insert($arrMixInsertData);

        $arrMixInsertData = [];
        $arrMixInsertData['first_name'] = 'Swapnil';
        $arrMixInsertData['last_name'] = 'Aherrao';
        $arrMixInsertData['middle_name'] = 'Rajendra';
        $arrMixInsertData['empoyee_id'] = 1;
        $arrMixInsertData['client_id'] = 1;
        $arrMixInsertData['created_by'] = 1;
        $arrMixInsertData['updated_by'] = 1;

        DB::table('profiles')->insert($arrMixInsertData);
    }
}
