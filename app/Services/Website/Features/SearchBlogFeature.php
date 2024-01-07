<?php

namespace App\Services\Website\Features;

use App\Domains\Blog\Jobs\SearchBlogJob;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use App\Domains\Http\Jobs\RespondWithViewJob;


class SearchBlogFeature extends Feature
{
    public function handle(Request $request)
    {
      
        $attributes = ['title', 'category_title', 'meta_title', 'tags' ,'slug'];

        $data['posts'] = $this->run(new SearchBlogJob($attributes, $request->get('query'), $request->all()));
       
        // return $this->run(new RespondWithViewJob('website::partials.blog-search-results', $data));
        return view('website::partials.blog-search-results')->with($data);
    }
}
