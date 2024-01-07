<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetPostsByScopeJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $scopes;
    public function __construct($scopes = [])
    {
        $this->scopes = $scopes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        // dd($post->getByScope($this->scopes));
        return $post->getByScope($this->scopes);
    }
    
    
}
