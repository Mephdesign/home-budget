<?php

namespace App\Livewire;

use App\Models\Dzienne;
use App\Models\Planowane;
use App\Models\Wplyw;
use App\Models\WydatkiPlanowaneSum;
use App\Models\WydatkiStaleSum;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DzienneList extends Component
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

        Dzienne::create($validate);

        $this->reset('name', 'kwota');

//        $sum = Dzienne::sum('kwota');
//        $wydSum = WydatkiPlanowaneSum::first();
//        $wydSum->kwota = $sum;
//        $wydSum->save();

        session()->flash('success', 'Dodane');

        $this->resetPage();

    }

    public function edit($id)
    {
        $planowane = Dzienne::find($id);
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
        $planowane = Dzienne::find($this->editingStaleId);
        $planowane->name = $this->newName;
        $planowane->kwota = $this->newKwota;
        $planowane->save();

//        $sum = Dzienne::sum('kwota');
//        $wydSum = WydatkiPlanowaneSum::first();
//        $wydSum->kwota = $sum;
//        $wydSum->save();

        $this->cancelEdit();
    }

    public function delete($id)
    {

        Dzienne::destroy($id);

//        $sum = Dzienne::sum('kwota');
//        $wydSum = WydatkiPlanowaneSum::first();
//        $wydSum->kwota = $sum;
//        $wydSum->save();

        session()->flash('success', 'Usunieto');

    }
    public function render()
    {
        $wplyw = Wplyw::latest()->first();
        return view('livewire.dzienne-list', [
            'dzienne' => Dzienne::latest()->where('name','like',"%{$this->search}%")->where('created_at','like','%'.date('Y-m-d'.'%'))->paginate(5),
            'wplyw' => $wplyw,
            'wydatki_planowane_sum' => WydatkiPlanowaneSum::latest()->first(),
            'wydatki_stale_sum' => WydatkiStaleSum::latest()->first(),
            'wydatki_dzienne_sum' => Dzienne::where('created_at','like','%'.date('Y-m-d'.'%'))->where('aktual', 1)->sum('kwota'),
            'wydatki_miesieczne_sum' => Dzienne::where('created_at','>', $wplyw->created_at)->where('aktual', 1)->sum('kwota'),
            'reset_day' => DB::table('config')->first()
        ]);
    }
}
