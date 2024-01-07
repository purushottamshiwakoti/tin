<?php
namespace App\Services\Website\Features;

use Lucid\Units\Feature;
use App\Data\Models\Rating;
use App\Data\Models\Booking;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Domains\Users\Jobs\UpdateUserJob;
use App\Domains\Website\Jobs\UpdateProfileJob;
use App\Services\Website\Http\Requests\UpdateUserRequest;

class EditProfileFeature extends Feature
{
    public function handle(UpdateUserRequest $request)
    {
        
        $userId=auth()->user()->id;
        
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {

            $filepath = $request->file('image');
      
            $name = auth('customer')->user()->id . '.' . $filepath->getClientOriginalExtension();
    
            $resizedPath = public_path('storage/resizedUserImage/');
            if(!file_exists($resizedPath))
            {
                mkdir($resizedPath,0777,true);
            }
            $imgFile = Image::make($filepath->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($resizedPath.$name);

            $validatedData['image'] = $name;
          }
        
        $customer = $this->run(new UpdateProfileJob($userId,$validatedData));

        return redirect()->back()->with(['message'=>'Update Successfully.','alert-type'=>'Success']);
       
    }
}
