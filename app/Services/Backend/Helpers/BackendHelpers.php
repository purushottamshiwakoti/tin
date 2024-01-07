<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/26/18
 * Time: 1:03 PM
 */


function oldValue($field,$dataObject = null)
{
    if(old($field))
    {
        return old($field);
    }

    return ($dataObject && isset($dataObject->{$field}))?$dataObject->{$field}:'';
}

function showInputError($field,$bag)
{
    if($bag->has($field))
    {
        return '<label class="col-form-label">'.$bag->first($field).'</label>';
    }
    return '';
}

function tripRating($rating)
{
    $html = '';
    for($i=0;$i<$rating;$i++)
    {
        $html.='<i class="fa fa-star" aria-hidden="true"></i>';
    }
    return $html;
}

if(!function_exists('buildTree')) {
    function buildTree($rootData)
    {
        $html = recursiveBuild($rootData);
        return $html;
    }
}


if(!function_exists('recursiveBuild')) {
    function recursiveBuild($rootData)
    {
        $html = '<ol class="dd-list">';

        foreach ($rootData as $k => $root) {
            $html.='<li data-name="'.$root->name.'" data-layout="'.$root->layout.'" data-link="'.$root->link.'" data-icon="'.$root->icon.'" data-description="'.$root->description.'" data-trip_id="'.$root->trip_id.'" class="dd-item deleteBox" data-id="'.$root->id.'">';
            $html .= '<div class="dd-handle">'.$root->name.'<button href="#" class="no-drag item-edit">Edit</button>';
            $html.='<a href="'.route('admin.menus.menu-items.destroy',[$root->menu->id,$root->id]).'" class="item-delete no-drag ajaxDelete">Delete</a></div>';
//            $html .= getChild($root);
            if (!$root->children->isEmpty()) {
                $html .= recursiveBuild($root->children);
            }
            $html .= '</li>';
        }

        $html .= '</ol>';
        return $html;
    }
}

/**setActive function
 *checks path and returns active or empty
 */
if(!function_exists('setActive')){
    function setActive($path){
        return request()->is('*/'.$path) || request()->is('*/'.$path.'/*')?'active pcoded-trigger':'';
    }
}
