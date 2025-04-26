<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'resume_file_path', 'cover_letter', 'job_listing_id'];
}
