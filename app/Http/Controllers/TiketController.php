<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Repository\TiketRepositoryInterface;

class TiketController extends Controller
{
    protected $tiketRepository;

    public function __construct(TiketRepositoryInterface $tiketRepository)
    {
        $this->tiketRepository = $tiketRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        return view('ticket.create', compact('films'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required',
            'showtime' => 'required|in:12:00,15:00,19:00',
            'studio' => 'required|in:1,2,3,4',
            'type' => 'required|in:Regular,VIP',
            'quantity' => 'required|integer',
        ]);

        $price = $request->type === 'Regular' ? 25000 : 45000;

        $this->tiketRepository->create([
            'film_id' => $request->film_id,
            'showtime' => $request->showtime,
            'studio' => $request->studio,
            'type' => $request->type,
            'price' => $price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('tiket.create')->with('success', 'Tiket berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        //
    }
}
