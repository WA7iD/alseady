<?php

namespace App\Http\Controllers\Dashboard\Offer;

use Exception;
use App\Models\Offer;
use App\Traits\FileManager;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Offer\OfferRequest;
use App\Models\ActivityImage;

class OfferController extends Controller
{
    use FileManager;
    public function __construct()
    {
        $this->middleware('permission:offers-read')->only('index');
        $this->middleware('permission:offers-create')->only('create', 'store');
        $this->middleware('permission:offers-update')->only('edit', 'update');
        $this->middleware('permission:offers-delete')->only('destroy');
    }
    public function index()
    {
        $offers = Offer::paginate(10);
        return view('dashboard.site.offers.index', compact('offers'));
    }

    public function edit(Offer $offer)
    {
        return view('dashboard.site.offers.edit', compact('offer'));
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $data =   $request->validated();
        $data['is_active'] = $request->is_active == 'on';
        $data = Arr::except($data, ['image']);
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'profiles/offers/images', $offer->image);
        }
        $offer->update($data);

        return redirect(route('offers.index'))->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function create()
    {
        return view('dashboard.site.Offers.create');
    }

    public function store(OfferRequest $request)
    {
        // dd($request);
        $data =   $request->validated();
        $data['is_active'] = $request->is_active == 'on';

        $data = Arr::except($data, ['images']);
        if ($request->image !== null) {
            $data['image'] = $this->handle('image', 'offers/images');
        }
        $offer = Offer::create($data);
        return redirect(route('offers.index'))->with([
            'success' => __('dashboard.created_successfully')
        ]);
    }

    public function destroy(Offer $Offer)
    {

        DB::beginTransaction();
        try {
            $this->deleteFile($Offer->image);
            $Offer->delete();
            DB::commit();
            return redirect()->route('offers.index',)->with(['success' => __('messages.deleted successfully')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('offers.index',)->with(['error' => __('messages.Something went wrong')]);
        }
    }

  
}
