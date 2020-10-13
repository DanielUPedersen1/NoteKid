<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	/*protected $fillable = [
    'name', 'title', 'category', 'content',
  ];*/
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
