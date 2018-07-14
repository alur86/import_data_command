<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;
use App\Shop;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Data in Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        

            $file_path = "public/files/shops.csv" ;


            $data = Excel::load($file_path, function($reader) {})->get();


            if(!empty($data) && $data->count()){


                foreach ($data->toArray() as $key => $value) {

                    if(!empty($value)){

                        foreach ($value as $v) {        

    $insert[] = ['region_id' => $v['region_id'], 'title' => $v['title'],'city' => $v['city'], 'address' => $v['address'] ];

                        }

                    }

                }


                

                if(!empty($insert)){

                    Shop::insert($insert);

                    return back()->with('success','Data Inserted successfully.');

                }


            }


        }


    
}
