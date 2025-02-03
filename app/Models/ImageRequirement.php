<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageRequirement extends Model
{
    use HasFactory;

    protected $table = 'requirements_img_tbl';

    protected $fillable = ['file_path', 'description', 'reference_number'];
}
