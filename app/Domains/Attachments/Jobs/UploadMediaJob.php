<?php
namespace App\Domains\Attachments\Jobs;

use App\Data\Repositories\Contracts\AttachmentInterface;
use App\Data\Repositories\Contracts\MediaInterface;
use Intervention\Image\Facades\Image;
use Lucid\Units\Job;

class UploadMediaJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $file;
    private $width;
    private $height;
    public function __construct($file,$width = '', $height = '')
    {
        $this->file = $file;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param MediaInterface $media
     * @return bool
     */
    public function handle(MediaInterface $media,AttachmentInterface $attachment)
    {
        $image = $this->file;
        if(!$image)
        {
            return false;
        }
        $original_name = $image->getClientOriginalName();
        $imageName = time().'.'.str_replace(' ','-',$original_name);
        $destinationPath = public_path('/uploads/original');
        $resizedPath = public_path('/uploads/resized/').$imageName;
        if(!file_exists($destinationPath))
        {
            mkdir($destinationPath,0777,true);
        }

        if(!file_exists($resizedPath))
        {
            mkdir($resizedPath,0777,true);
        }
        if($this->width && $this->height)
        {
            Image::make($image->getRealPath())->fit($this->width,$this->height)->save($resizedPath);
        }
        if($image->move($destinationPath, $imageName))
        {
            $result = $media->fillAndSave(['file_name'=>$imageName,'original_name'=>$original_name]);
            return $attachment->fillAndSave(['media_id'=>$result->id,'attachable_id'=>null,'attachable_type'=>null]);
        }
        return false;
    }
}
