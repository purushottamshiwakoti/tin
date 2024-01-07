<?php
namespace App\Domains\Metas\Jobs;

use Lucid\Units\Job;

class MakeMetasJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        $metas = [
            'meta_title'=>$this->data->meta_title,
            'meta_description'=>$this->data->meta_description,
            'meta_keywords'=>$this->data->meta_keywords,
            'image'=>$this->data->getCoverImage()?$this->data->getCoverImage():$this->data->getFirstImage(),
            'page_title'=>isset($this->data->title)?$this->data->title:$this->data->meta_title,
        ];
        return json_decode(json_encode($metas));
    }
}
