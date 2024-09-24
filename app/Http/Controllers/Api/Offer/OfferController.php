<?php

namespace App\Http\Controllers\Api\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\Offer\OfferRequest;
use App\Http\Requests\Api\Web\Offer\SubscripeOfferRequest;
use App\Http\Resources\Web\Offer\OfferResource;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Subscription;
use App\Traits\FileManager;
use App\Traits\Responser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
  use Responser;

  public function index(OfferRequest $request)
  {
    $offers = Offer::active()
      ->orderBy('created_at', 'desc')
      ->when($request['price_from'] && $request['price_to'], function ($query) use ($request) {
        $query->whereBetween('price', [$request['price_from'], $request['price_to']]);
      })
      ->when($request->text, function ($query) use ($request) {
        $query->where('title_ar', 'LIKE', '%' . $request->title . '%');
        $query->orWhere('title_en', 'LIKE', '%' . $request->title . '%');
        $query->orWhere('description_en', 'LIKE', '%' . $request->title . '%');
        $query->orWhere('description_ar', 'LIKE', '%' . $request->title . '%');
      })->paginate(4);
    $offers =  OfferResource::collection($offers)->response()->getData(true);
    return $this->returnData('data', $offers);
  }

  public function show($id)
  {
    $offer = Offer::where('id', $id)->active()->first();
    if ($offer) {
      $offer = new OfferResource($offer);
      return $this->returnData('data', $offer);
    } else {
      return $this->returnError('404', __('dashboard.not_found'));
    }
  }

  public function subscripe(SubscripeOfferRequest $request)
  {
    Subscription::create($request->validated());
    return $this->returnSuccessMassage(__('dashboard.sent_successfully'));
  }
}
