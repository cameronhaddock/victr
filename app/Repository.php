<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ixudra\Curl\Facades\Curl;
class Repository extends Model
{
    protected $fillable = [
        'repository_id',
        'name',
        'owner',
        'description',
        'stars',
        'url',
        'created',
        'last_push',
    ];

    public static function getFromGithub($q='php', $page=1)
    {
        $repositories = Curl::to('https://api.github.com/search/repositories?q='.$q.'&sort=stars&order=desc&page='.$page)
                            ->withHeader('User-Agent: VICTR')
                            ->get();
        return $repositories;
    }

    public function last_push_date_for_humans(){
        return \Carbon\Carbon::createFromFormat(\Carbon\Carbon::DEFAULT_TO_STRING_FORMAT,$this->last_push)->diffForHumans();
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function creted_date_for_humans()
    {
        return \Carbon\Carbon::createFromFormat(\Carbon\Carbon::DEFAULT_TO_STRING_FORMAT,$this->created)->diffForHumans();
    }

}