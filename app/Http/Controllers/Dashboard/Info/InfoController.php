<?php

namespace App\Http\Controllers\Dashboard\Info;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Info\InfoService;
use App\Repository\Eloquent\InfoRepository;
use App\Repository\InfoRepositoryInterface;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    protected InfoRepositoryInterface $infoRepository;
    protected InfoService $infoService;

    public function __construct(
        InfoRepositoryInterface $infoRepository,
        InfoService             $infoService,
    )
    {
        $this->middleware('permission:structures-update');
        $this->infoRepository = $infoRepository;
        $this->infoRepository = $infoRepository;
        $this->infoService = $infoService;
    }

    public function index(){
        $infos =$this->infoRepository->getAll();
        return view('dashboard.site.infos.index',compact('infos'));
    }

    public function store(){
        
    }


}
