<?php

namespace App\Livewire;

use App\Models\Planowane;
use App\Models\Wplyw;
use App\Models\WydatkiPlanowaneSum;
use App\Models\WydatkiStaleSum;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PlanowaneList extends Component
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

        Planowane::create($validate);

        $this->reset('name', 'kwota');

        $sum = Planowane::sum('kwota');
        $wydSum = WydatkiPlanowaneSum::first();
        $wydSum->kwota = $sum;
        $wydSum->save();

        session()->flash('success', 'Dodane');

        $this->resetPage();

    }

    public function edit($id)
    {
        $stale = Planowane::find($id);
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
        $stale = Planowane::find($this->editingStaleId);
        $stale->name = $this->newName;
        $stale->kwota = $this->newKwota;
        $stale->save();

        $this->cancelEdit();
    }

    public function toggle($id)
    {
        $stale = Planowane::find($id);
        $stale->completed = !$stale->completed;
        $stale->save();
        $sum = Planowane::where('completed' , '0')->sum('kwota');
        $wydSum = WydatkiPlanowaneSum::first();
        $wydSum->pozostalo = $sum;
        $wydSum->save();
    }

    public function delete($id)
    {

        Planowane::destroy($id);

        session()->flash('success', 'Usunieto');

    }
    public function render()
    {
        return view('plan-stale', [
            'stale' => Planowane::latest()->where('name','like',"%{$this->search}%")->paginate(5),
            'wplyw' => Wplyw::latest()->first(),
            'wydatki_stale_sum' => WydatkiPlanowaneSum::latest()->first()
        ]);
    }
}
