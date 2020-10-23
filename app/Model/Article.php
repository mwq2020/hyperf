<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $title 
 * @property string $content 
 * @property int $add_time 
 * @property int $update_time 
 */
class Article extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'add_time' => 'integer', 'update_time' => 'integer'];
}