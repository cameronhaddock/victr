<?php

namespace App\Http\Controllers;

use App\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;


class RepositoriesController extends Controller
{
    public function index()
    {
        $repo = Repository::all();
        return view('repositories.index',['repos'=>$repo]);
    }

    public function fetch()
    {
        return view('repositories.fetch');
    }

    public function save(Request $request)
    {
        $count = $request->get('count');

        for($i=1 ; $i < $count+1 ; $i++)
        {
            $repositories = json_decode(Repository::getFromGithub('php',$i));
            foreach($repositories->items as $repository)
            {
                $repo = Repository::firstOrNew(['repository_id'=>$repository->id]);
                $repo->name = $repository->name;
                $repo->owner = $repository->owner->login;
                $repo->description = $repository->description;
                $repo->stars = $repository->stargazers_count;
                $repo->url = $repository->url;
                $repo->created = Carbon::createFromFormat(Carbon::ISO8601, $repository->created_at);
                $repo->last_push = Carbon::createFromFormat(Carbon::ISO8601, $repository->pushed_at);
                $repo->save();
            }
        }

        flash()->success('Repository updated successfully');
        return redirect()->route('repositories.index');
    }

    public function show(Repository $repository)
    {
        return view('repositories.show',['repo'=>$repository]);
    }
}
