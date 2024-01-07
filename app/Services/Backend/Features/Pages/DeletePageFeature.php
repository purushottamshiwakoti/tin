<?php
namespace App\Services\Backend\Features\Pages;

use App\Domains\Pages\Jobs\DeletePageJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class DeletePageFeature extends Feature
{
    public function handle(Request $request)
    {
        $result = $this->run(new DeletePageJob($request->page));
        return $result;
    }
}
