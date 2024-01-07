<?php
namespace App\Services\Offers\Features;

use App\Data\Repositories\Contracts\OfferInterface;
use App\Domains\Backend\Jobs\GetSingleRepositoryJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Trips\Jobs\GetAllFixedDeparturesJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowOfferAddUpdateFeature extends Feature
{
    public function handle(Request $request,OfferInterface $offer)
    {
        $data = [];
        $data['offer'] = null;
        $data['trips'] = $this->run(new GetAllFixedDeparturesJob());
        if($offerId = $request->offer)
        {
            if(!$data['offer'] = $this->run(new GetSingleRepositoryJob($offer,$offerId)))
            {
                throw new NotFoundHttpException();
            }
        }

        return $this->run(new RespondWithViewJob('offers::edit-add',$data));
    }
}
