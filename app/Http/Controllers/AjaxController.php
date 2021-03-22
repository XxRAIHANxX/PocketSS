<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Themeoption;
use App\Menu;
use FHelper;
use BHelper;


class AjaxController extends Controller
{
    
    public static function updateThemeOption(Request $request)
    {
        if($request->input('name') == 'menu')
        {
            Themeoption::where('name','=','menu')->delete();
            $option = new Themeoption;
            $option->name = 'menu';
            $option->content = $request->input('content');
            $option->save();
        }

    }

    public static function insert(Request $request)
    {
        if($request->route('action') == 'menu')
        {
            $menu  = new Menu;
            $menu->label = $request->label;
            $menu->link = $request->link;
            $menu->save();

            $new_menu = json_decode(FHelper::option('menu'),true);

            Themeoption::where('name','=','menu')->delete();
            $option = new Themeoption;
            $option->name = 'menu';
            $option->content = json_encode(array_merge($new_menu,[['id'=>$menu->id]]));
            $option->save();

            return $menu->id;

        }
    }

    public static function get(Request $request){
        $html = '';
        if($request->route('what') == 'region')
        {
            $html .='<select id="region" class="form-control" name="region"> <option value="">-Select Region-</option>'; 
            foreach(FHelper::getRegion($request->input('id')) as $region){
                $html .= '<option value="'.$region->id.'">'.$region->name.'</option>';
            }
            $html .= '</select>';
            return $html;

        }
        else if($request->route('what') == 'city')
        {
            $html .='<select id="city" class="form-control" name="city_id"> <option value="">-Select City-</option>'; 
            foreach(FHelper::getCity($request->input('id')) as $city){
                $html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
            }

            $html .= '</select>';
            return $html;

        }

    }
}
