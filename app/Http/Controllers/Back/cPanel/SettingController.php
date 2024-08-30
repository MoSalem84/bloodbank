<?php

namespace App\Http\Controllers\Back\cPanel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index()
    {
        // $columns = DB::getSchemaBuilder()->getColumnListing('settings');
        $record = Setting::firstOrNew();

        return view('back.admin.cpanel.sections.administration-panel.site-settings.index', compact('record'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $record = Setting::updateOrCreate(
            ['id' => 1], // conditions
           $request->all() // create
            );

    return view('back.admin.cpanel.sections.administration-panel.site-settings.index', compact('record'));



    }

}
