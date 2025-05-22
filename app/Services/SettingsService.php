<?php

namespace App\Services;

use App\Models\Order;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Cache;


class SettingsService
{

    public function index(): array
    {
        $data = [];
        $data['settingLists']     = $this->settingList();
        return $data;
    }
    public function saveSettings($request)
    {
        // $types = $request->types;
        // foreach ($types as $key => $value) {
        //     SystemSetting::updateOrCreate([
        //         'key' => $key
        //     ], [
        //         'value' => $value
        //     ]);
        // }
        if ($request->systemFiles) {
            $path = 'public/uploads/';
            foreach ($request->systemFiles as $key => $file) {

                SystemSetting::updateOrCreate([
                    'key' => $key
                ], [
                    'value' => fileUpdate(getSetting($key), $path, $file)
                ]);
            }
        }
        Cache::forget('system_settings');
    }
    private function formatParams($request, $model = null) {}
    public function settingList(): array
    {
        return [

            [
                'name'  => 'System Info',
                'value' => 'system_info'
            ],
 

        ];
    }
    public function authIndex(): array
    {
        $data = [];
        $data['authSettingLists'] = $this->authSettingList();
        return $data;
    }
    public function authSettingList(): array
    {
        return [
            [
                'name'  => 'Google',
                'value' => 'google'
            ],
            [
                'name'  => 'Facebook',
                'value' => 'facebook'
            ]
        ];
    }
}
