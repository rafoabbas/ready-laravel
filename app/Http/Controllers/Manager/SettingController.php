<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function general(){
        return view('manager.pages.setting.general');
    }

    public function generalUpdate(Request $request){


        $request->validate([
            'application_name' => 'required|string',
            'site_name' => 'required|string',
            'homepage_title' => 'required|string',
            'site_description' => 'required|string',
            'copyright' => 'required|string',
            'keywords' => 'required|string',
            'footer_about_section' => 'required|string',
        ]);


        $data = $request->except('_token');


        $data = array_map(function($key, $value) {
            return ['key' => $key, 'value' => $value];
            }, array_keys($data), array_values($data)
        );




        $this->update($data);

        return redirect(route('manager.setting.general'))->with(toast());

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function visual(){
        return view('manager.pages.setting.visual');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function visualUpdate(Request  $request){
        $data = [];
        if ($request->file('logo')){
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $path = $request->file('logo')->storeAs(
                'img', 'logo.'.$request->file('logo')->getClientOriginalExtension(),[
                    'disk' => 'uploads'
                ]
            );

            $data[0]['key'] = 'logo';
            $data[0]['value'] = $path;

            //dd($path);
        }
        if ($request->file('logo_dark')){
            $request->validate([
                'logo_dark' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $path = $request->file('logo_dark')->storeAs(
                'img', 'logo_dark.'.$request->file('logo_dark')->getClientOriginalExtension(),[
                    'disk' => 'uploads'
                ]
            );

            $data[4]['key'] = 'logo_dark';
            $data[4]['value'] = $path;

            //dd($path);
        }

        if ($request->file('logo_footer')){

            $request->validate([
                'logo_footer' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $path = $request->file('logo_footer')->storeAs(
                'img', 'logo_footer.'.$request->file('logo_footer')->getClientOriginalExtension(),[
                    'disk' => 'uploads'
                ]
            );
            $data[1]['key'] = 'logo_footer';
            $data[1]['value'] = $path;
        }
        if ($request->file('favicon')){
            $request->validate([
                'logo_footer' => 'image|mimes:png,ico,svg|max:2048'
            ]);

            $path = $request->file('favicon')->storeAs(
                'img', 'favicon.'.$request->file('favicon')->getClientOriginalExtension(),[
                    'disk' => 'uploads'
                ]
            );
            $data[2]['key'] = 'favicon';
            $data[2]['value'] = $path;
        }
        $this->update($data);

        return redirect(route('manager.setting.visual'))->with(toast());

    }

    /**
     * @param array $data
     */
    public function update(array $data){
        foreach ($data as $item){
            Setting::updateOrCreate([
                'key' => $item['key']
            ],[
                'value' => $item['value']
            ]);
        }
    }
}
