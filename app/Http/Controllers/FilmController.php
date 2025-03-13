<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FilmRepositoryInterface;

class FilmController extends Controller
{
    protected $filmRepository;

    public function __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function index()
    {
        $films = $this->filmRepository->getAll();
        return view('film.index', compact('films')); 
    }


    public function create()
    {
        return view('film.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->filmRepository->create($request->all());
        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $film = $this->filmRepository->findById($id);
        return view('film.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nama_film' => 'required|max:255|unique:films,Nama_film,' . $id,
        ]);

        $this->filmRepository->update($id, $validatedData);
        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->filmRepository->delete($id);
        return redirect()->route('film.index')->with('deleted', 'Film berhasil dihapus!');
    }
}
