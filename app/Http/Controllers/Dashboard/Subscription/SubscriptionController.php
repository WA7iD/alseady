<?php

namespace App\Http\Controllers\Dashboard\Subscription;

use Exception;
use App\Traits\FileManager;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Subscription\SubscriptionRequest;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subscriptions-read')->only('index', 'show');
        $this->middleware('permission:subscriptions-delete')->only('destroy');
    }

    public function index()
    {
        $subscriptions = Subscription::orderBy("created_at",'DESC')->paginate();
        return view('dashboard.site.subscriptions.index', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function show(Subscription $subscription)
    {
        if (!$subscription->is_read) {
            $subscription->update(['is_read' => 1]);
        }
        return view('dashboard.site.subscriptions.show', [
            'subscription' => $subscription
        ]);
    }

    public function destroy(Subscription $subscription)
    {
        DB::beginTransaction();
        try {
            $subscription->delete();
            DB::commit();
            return redirect()->route('subscriptions.index')->with('success', __('messages.deleted successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('subscriptions.show',  $subscription->id)->with(['error' => __('messages.Something went wrong')]);
        }
    }
}



