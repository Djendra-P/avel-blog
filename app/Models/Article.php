<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table = 'articles';
  protected $fillable = [
    'author_id', 'category_id', 'title', 'slug', 'excerpt', 'body', 'is_publish', 'updated_at', 'created_at'
  ];
}
