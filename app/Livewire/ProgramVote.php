<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Livewire\ProgramVote;

use App\Models\Programme;




class ProgramVote extends Component
{
    public function render()
    {
        return view('livewire.program-vote');
    }
    public $program;

    public function like()
    {
        $this->program->increment('likes');
    }
    private function vote($type)
    {

        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà voté pour ce programme
        $existingVote = Vote::where('user_id', $user->id)
                            ->where('program_id', $this->program->id)
                            ->first();

        if ($existingVote) {
            // Mise à jour du vote existant
            $existingVote->update(['vote' => $type]);
        } else {
            // Création d'un nouveau vote
            Vote::create([
                'user_id' => $user->id,
                'program_id' => $this->program->id,
                'vote' => $type,
            ]);
        }

        // Rafraîchir le modèle Programme pour refléter les nouveaux votes
        $this->program->refresh();

    }

    public function dislike()
    {
        $this->program->increment('dislikes');
    }



}
