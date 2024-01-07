<?php
namespace App\Domains\ExtraValues\Jobs;

use App\Data\Repositories\Contracts\ExtraValueInterface;
use Lucid\Units\Job;

class GetTripNoteKeysJob extends Job
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
    public function handle(ExtraValueInterface $extraValue)
    {
        $columnKeys = $extraValue->getExtraKeysListByType('notes');
        $constKeys = config('constants.trip_notes');
        return array_merge($columnKeys,$constKeys);
    }
}
