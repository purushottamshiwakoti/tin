<?php
namespace App\Services\Blog\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class ShowPostIndexFeature extends Feature
{
    public function handle(Request $request)
    {

        return $this->run(new RespondWithViewJob('backend::posts.index'));
    }
}