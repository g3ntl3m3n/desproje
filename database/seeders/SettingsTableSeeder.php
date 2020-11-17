<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            
                [
                    'description' => 'Title',
                    'key'         => 'key',
                    'value'       => 'TEST',
                    'type'        => 'text',
                    'must'        => 0,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'logo',
                    'key'         => 'logo',
                    'value'       => 'logo.png',
                    'type'        => 'file',
                    'must'        => 1,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'icon',
                    'key'         => 'icon',
                    'value'       => 'icon.ico',
                    'type'        => 'file',
                    'must'        => 2,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'SEO',
                    'key'         => 'Keywords',
                    'value'       => 'blog, cms, ecms',
                    'type'        => 'text',
                    'must'        => 3,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'Phone',
                    'key'         => 'phone',
                    'value'       => '555555',
                    'type'        => 'text',
                    'must'        => 4,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'Mail',
                    'key'         => 'mail',
                    'value'       => 'mail@mail.com',
                    'type'        => 'text',
                    'must'        => 5,
                    'delete'      => 0,
                    'status'      => 1        
                ],
                [
                    'description' => 'Address',
                    'key'         => 'address',
                    'value'       => 'address/address',
                    'type'        => 'text',
                    'must'        => 6,
                    'delete'      => 0,
                    'status'      => 1        
                ]


        );
    }
}
