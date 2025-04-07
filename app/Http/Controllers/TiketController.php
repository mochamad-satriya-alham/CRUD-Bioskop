<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Repository\Tiket\TiketRepositoryInterface;
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


    public function edit($id)
    {
        $tiket = $this->tiketRepository->findById($id);
        $films = Film::all(); 
        return view('ticket.edit', compact('tiket', 'films'));
    }

    
    public function update(TiketRequest $request, $id)
    {
        $this->tiketRepository->update($id, $request->validated());
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil diperbarui!');
    }


    public function destroy($id)
    {
    $this->tiketRepository->delete($id);
    return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dihapus.');
    }

}
