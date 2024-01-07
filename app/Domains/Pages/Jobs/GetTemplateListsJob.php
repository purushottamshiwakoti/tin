<?php
namespace App\Domains\Pages\Jobs;

use Illuminate\Support\Facades\Storage;
use Lucid\Units\Job;

class GetTemplateListsJob extends Job
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
     * @return array
     */
    public function handle()
    {
        $files = Storage::disk('templates')->files('');
        $templates = [];
        foreach ($files as $file)
        {
            $pathArray = explode('.',$file);
            if(!isset($pathArray[0])){
                continue;
            }
            $templates[$pathArray[0]]=ucwords(str_replace('-',' ',$pathArray[0]));
        }
        return collect($templates);
    }
}
