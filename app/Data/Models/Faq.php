<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 6/29/18
 * Time: 1:08 PM
 */

namespace App\Data\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{

    use SoftDeletes;
    protected $table = 'trip_faqs';

    protected $fillable = [
        'trip_id',
        'question',
        'answer',
        'category_id',
        'category_title',
        'publish'
    ];

    public $indexColumns = [
        'question',
        'answer',
        // 'category_title'
    ];

    public $settingOptions = [
        'showActions'=>true,
        'editable'=>true,
        'deletable'=>true,
        'readable'=>true
    ];


    // protected static function boot()
    // {
    //     static::saving(function($model){
    //         $model->category_title = $model->category->title;
    //     });
    //     parent::boot(); // TODO: Change the autogenerated stub
    // }

    // public function getCategoryOptionsAttribute($value)
    // {
    //     return CustomField::where('type','faq-category')->get();

    // }

    // public function category()
    // {
    //     return $this->belongsTo(CustomField::class,'category_id','id')->where('type','faq-category');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function trip()
    // {
    //     return $this->belongsTo(Trip::class);
    // }

    public function getIndexColumns()
    {
        return [
            // 'trip_id',
            'question',
            'answer',
        ];
    }
}