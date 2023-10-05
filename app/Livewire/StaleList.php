<?php

namespace App\Livewire;

use App\Models\Stale;
use App\Models\Wplyw;
use App\Models\WydatkiStaleSum;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class StaleList extends Component
{
    use WithPagination;

    public $name;
    public $kwota;
    public $newName;
    public $newKwota;
    public $editingStaleId;
    public $search;


    public function getWplyw()
    {

    }

    public function create()
    {
        $validate = $this->validate([
                'name' => 'required',
                'kwota' => 'required',
            ]);
        $validate['miesiac'] = date('m');

        Stale::create($validate);

        $this->reset('name', 'kwota');

        $sum = Stale::sum('kwota');
        $wydSum = WydatkiStaleSum::first();
        $wydSum->kwota = $sum;
        $wydSum->save();

        session()->flash('success', 'Dodane');

        $this->resetPage();

    }

    public function edit($id)
    {
        $stale = Stale::find($id);
        $this->newName = $stale->name;
        $this->newKwota = $stale->kwota;
        $this->editingStaleId = $stale->id;
    }

    public function cancelEdit()
    {
        $this->reset('newName', 'newKwota', 'editingStaleId');
    }

    public function update()
    {
        $this->validate([
            'newName' => 'required',
            'newKwota' => 'required',
        ]);
        $stale = Stale::find($this->editingStaleId);
        $stale->name = $this->newName;
        $stale->kwota = $this->newKwota;
        $stale->save();

        $this->cancelEdit();
    }

    public function toggle($id)
    {
        $stale = Stale::find($id);
        $stale->completed = !$stale->completed;
        $stale->save();
        $sum = Stale::where('completed' , '0')->sum('kwota');
        $wydSum = WydatkiStaleSum::first();
        $wydSum->pozostalo = $sum;
        $wydSum->save();
    }

    public function delete($id)
    {

        Stale::destroy($id);

        session()->flash('success', 'Usunieto');

    }
    public function render()
    {
        return view('livewire.stale-list', [
            'stale' => Stale::latest()->where('name','like',"%{$this->search}%")->paginate(5),
            'wplyw' => Wplyw::latest()->first(),
            'wydatki_stale_sum' => WydatkiStaleSum::latest()->first()
        ]);
    }
}
