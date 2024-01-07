<?php
namespace App\Services\Backend\Features;

use App\Domains\CustomFields\Jobs\StoreCustomFieldJob;
use App\Domains\CustomFields\Jobs\UpdateCustomFieldJob;
use Lucid\Units\Feature;
use Illuminate\Http\Request;

class StoreFaqCategoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->all();
        if(!$request->get('is_page'))
        {
            $data['extras'] = '';
        }else{
            $data['extras'] = json_encode($data['extras']);
        }
        if($request->faq_category)
        {
            $customField = $this->run(new UpdateCustomFieldJob('faq-category',$data,$request->faq_category));
        }else{
            $customField = $this->run(new StoreCustomFieldJob('faq-category',$data));
        }

        if($customField)
        {
            return redirect()->route('admin.faq-categories.index')->with(['message'=>'Successfully added category','alert-type'=>'success']);
        }
        $result = ['message'=>'Something went wrong','alert-type'=>'error'];
        return redirect()->back()->with($result);
    }
}
