<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Repository\TiketRepositoryInterface;
use App\Http\Requests\TiketRequest;

class TiketController extends Controller
{
    protected $tiketRepository;

    public function __construct(TiketRepositoryInterface $tiketRepository)
    {
        $this->tiketRepository = $tiketRepository;
    }

    public function index()
    {
        $tikets = $this->tiketRepository->getAll();
        return view('ticket.index', compact('tikets'));
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
    public function store(TiketRequest $request)
    {
        $this->tiketRepository->create($request->validated());
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil ditambahkan!');
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
