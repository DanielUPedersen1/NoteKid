<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = ['name'];

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'user_id');
  }

  public function notes()
  {
    return $this->belongsToMany(Note::class);
  }
}
