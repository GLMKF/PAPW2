<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    protected $fillable = ['user','position','statusMarital','birthdate','address','addressInfo','cellphone','cellphoneInfo','aboutMe','languages','workExperience','workExperience_jobs','portfolio','portfolio_sections','education','education_categories'];
    protected $table = 'cvs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
