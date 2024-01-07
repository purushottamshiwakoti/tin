<?php
namespace App\Domains\Blog\Jobs;

use App\Data\Repositories\Contracts\PostInterface;
use Lucid\Units\Job;

class GetArchiveListJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostInterface $post)
    {
        $dateArray = $post->getArchives();
        $newDate = array();
        foreach($dateArray as $date)
        {

            $newDate[] = $date->created_at->format('F Y');

        }
        $newDate = array_unique($newDate);
        $archives = [];
        foreach ($newDate as $d)
        {
            $archives[] = ['title'=>$d,'slug'=>str_replace(' ','-',$d)];
        }
        return json_decode(json_encode($archives));
    }
}
