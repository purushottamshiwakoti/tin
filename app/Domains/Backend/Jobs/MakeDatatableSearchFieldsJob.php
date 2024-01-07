<?php
namespace App\Domains\Backend\Jobs;

use Lucid\Units\Job;

class MakeDatatableSearchFieldsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $inputs;
    public function __construct($inputs = [])
    {
        $this->inputs = $inputs;
    }

    /**
     * @return array
     */
    public function handle()
    {
        $value = (isset($this->inputs['search']) && isset($this->inputs['search']['value']))?$this->inputs['search']['value']:'';
        $columns = isset($this->inputs['columns'])?$this->inputs['columns']:[];
        $search = [];
//        $search = ['draw'=>$this->inputs['draw'],'start'=>$this->inputs['start']];
        foreach ($columns as $k=>$column)
        {
            if($column['searchable'] !== 'false')
            {
                $search[$column['data']] = $value;
            }

        }

        return $search;

    }
}
