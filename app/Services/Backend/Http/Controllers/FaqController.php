<?php
namespace App\Services\Backend\Http\Controllers;

use App\Data\Repositories\Contracts\FaqInterface;
use App\Services\Backend\Tratis\ControllerActionTrait;
use Lucid\Units\Controller;

class FaqController extends Controller
{

    use ControllerActionTrait;

    public $interface;
    public function __construct(FaqInterface $faq)
    {
        // print_r('here');exit;
        $this->interface = $faq;
    }
}
