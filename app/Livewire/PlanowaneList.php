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
        $validate['miesiac'] = date('m');

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
        $planowane = Planowane::find($id);
        $this->newName = $planowane->name;
        $this->newKwota = $planowane->kwota;
        $this->editingStaleId = $planowane->id;
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
        $planowane = Planowane::find($this->editingStaleId);
        $planowane->name = $this->newName;
        $planowane->kwota = $this->newKwota;
        $planowane->save();

        $sum = Planowane::sum('kwota');
        $wydSum = WydatkiPlanowaneSum::first();
        $wydSum->kwota = $sum;
        $wydSum->save();

        $this->cancelEdit();
    }

    public function toggle($id)
    {
        $planowane = Planowane::find($id);
        $planowane->completed = !$planowane->completed;
        $planowane->save();
        $sum = Planowane::where('completed' , '0')->sum('kwota');
        $wydSum = WydatkiPlanowaneSum::first();
        $wydSum->pozostalo = $sum;
        $wydSum->save();
    }

    public function delete($id)
    {

        Planowane::destroy($id);

        $sum = Planowane::sum('kwota');
        $wydSum = WydatkiPlanowaneSum::first();
        $wydSum->kwota = $sum;
        $wydSum->save();

        session()->flash('success', 'Usunieto');

    }
    public function render()
    {
        return view('livewire.planowane-list', [
            'planowane' => Planowane::latest()->where('name','like',"%{$this->search}%")->paginate(5),
            'wplyw' => Wplyw::latest()->first(),
            'wydatki_planowane_sum' => WydatkiPlanowaneSum::latest()->first(),
            'wydatki_stale_sum' => WydatkiStaleSum::latest()->first()
        ]);
    }
}
