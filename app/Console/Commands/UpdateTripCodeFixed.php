<?php

namespace App\Console\Commands;

use App\Data\Models\FixedDeparture;
use Illuminate\Console\Command;

class UpdateTripCodeFixed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixedcode:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates Trip Code in Fixed Departure Table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fixed = new FixedDeparture();
        $departures = $fixed->all();
        foreach ($departures as $departure)
        {
            $departure->trip_code = optional($departure->trip)->trip_code.'-'.optional($departure->start_date)->format('dmy');
            $departure->save();
        }
    }
}
