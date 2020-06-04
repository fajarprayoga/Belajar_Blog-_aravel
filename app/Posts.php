<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//panggi librRY softDeletes
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{

    //gunakan SOftDelete
    use SoftDeletes;

    protected $fillable =['judul', 'category_id', 'content', 'gambar', 'slug', 'user_id'];
    function category()
    {
        return $this->BelongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }

    public function user()
    {
        // relasi secara manual
        // pada table post dengan nama_user berelasi dengn id yang ada pada table user
        // return $this->belongsTo('App\User', nama_user, id);

        return $this->belongsTo('App\User');
    }
}
