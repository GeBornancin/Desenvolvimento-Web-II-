<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Importa o Blade
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {

    public function register() {
        //
    }


    public function boot() {
        
        // Registra o componente com o alias "datalist"
        Blade::component('components.datalist_eixo', 'datalistEixo');
        Blade::component('components.datalist_curso', 'datalistCurso');
        Blade::component('components.datalist_professor','datalistProfessor');
        Blade::component('components.datalist_disciplina', 'datalistDisciplina');
    }
}
