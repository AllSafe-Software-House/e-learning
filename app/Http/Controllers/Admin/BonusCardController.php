<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonusCard;
use Illuminate\Http\Request;

class BonusCardController extends Controller
{
    public function index()
    {
        removeContentLocale();
        // $this->authorize('admin_blog_lists');
        $query = BonusCard::query();

        $bonus_cards = $query->orderBy('created_at', 'desc')
            ->paginate(10);
        $data = [
            'pageTitle' => trans('update.Bonus_card'),
            'bonus_cards' => $bonus_cards,
        ];
        return view('admin.bonus_card.index', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'logo' => 'required',
            'discount' => 'required|string',
        ]);

        BonusCard::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'location'      => $request->location,
            'logo'          => $request->logo,
            'discount'      => $request->discount,
        ]);

        return back()->with('success', 'Bonus Card added successfully');
    }

    public function update(Request $request, BonusCard $bonusCard)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'logo' => 'nullable',
            'discount' => 'required|string',
        ]);

        $bonusCard->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'location'      => $request->location,
            'logo'          => $request->logo,
            'discount'      => $request->discount,
        ]);

        return back()->with('success', 'Bonus Card updated successfully');
    }

    public function destroy(BonusCard $bonusCard)
    {
        $bonusCard->delete();

        return back()->with('success', 'Bonus Card deleted successfully');
    }


}