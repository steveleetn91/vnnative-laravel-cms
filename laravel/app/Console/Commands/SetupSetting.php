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
        $sitename = $this->ask('What is your site name?');
        if(strlen($sitename) <= 2) {
            exit("ERROR: Site name shuold have more than 2 characters ");
        }
        /**
         * Slogan site 
         */
        $slogan = $this->ask('What is your slogan site?');
        if(strlen($slogan) <= 2) {
            exit("ERROR: Slogan shuold have more than 2 characters ");
        }
        /**
         * SMTP Mail
         */
        $smtp_mail = $this->ask('What is your smtp mail site?');
        if(strlen($smtp_mail) <= 2) {
            exit("ERROR: Smtp mail shuold have more than 6 characters ");
        }
        SettingModel::insert([
            [
                'key' => 'sitename',
                'value' => $sitename,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ],
            [
                'key' => 'siteslogan',
                'value' => $slogan,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'key' => 'contact_mail',
                'value' => $smtp_mail,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'key' => 'lang',
                'value' => 'en',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ],
            [
                'key' => 'menu_builder',
                'value' => '[]',
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ]
        ]);
        $this->line("Login here : " . env('APP_URL') . '/user/login');
        $this->line("Register here : " . env('APP_URL') . '/user/register');
        $this->line("Note : First account register will have full roles, 
        and accounts register late will can't login if that account has not approved by admin");
    }
}
