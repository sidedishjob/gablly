<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'posts';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'user_id',
		'image_path',
		'title',
		'body',
		'version'
	];

}