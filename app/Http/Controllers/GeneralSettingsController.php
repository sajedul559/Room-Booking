<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingsService;

class GeneralSettingsController extends Controller
{
    protected $systemSettingService;

    public function __construct()
    {
        $this->systemSettingService = new SettingsService();
    }
    public function index()
    {
        $data = $this->systemSettingService->index();
        return view('backend.settings.general.index', $data);
    }
    public function store(Request $request)
    {
        try {
            $this->systemSettingService->saveSettings($request);
            toaster();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
