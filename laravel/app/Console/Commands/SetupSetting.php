<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\SettingModel;

class SetupSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:setting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup default setting for cms';

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
        //
        /**
         * Site name
         */
        SettingModel::insert([
            [
                'key' => 'sitename',
                'value' => 'Vn Native Cms',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ],
            [
                'key' => 'siteslogan',
                'value' => 'Example Cms',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'key' => 'contact_mail',
                'value' => 'example@gmail.com',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'key' => 'lang',
                'value' => 'en',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ]
        ]);
    }
}
