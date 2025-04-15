<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Criar 6 tarefas
        Task::insert([
            [
                'todo_list_id' => 1, // Substitua pelo ID da sua lista de tarefas
                'title' => 'Tarefa 1',
                'description' => 'Descrição da tarefa 1',
                'is_completed' => false,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
            [
                'todo_list_id' => 1,
                'title' => 'Tarefa 2',
                'description' => 'Descrição da tarefa 2',
                'is_completed' => false,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
            [
                'todo_list_id' => 1,
                'title' => 'Tarefa 3',
                'description' => 'Descrição da tarefa 3',
                'is_completed' => true,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
            [
                'todo_list_id' => 1,
                'title' => 'Tarefa 4',
                'description' => 'Descrição da tarefa 4',
                'is_completed' => false,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
            [
                'todo_list_id' => 1,
                'title' => 'Tarefa 5',
                'description' => 'Descrição da tarefa 5',
                'is_completed' => true,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
            [
                'todo_list_id' => 1,
                'title' => 'Tarefa 6',
                'description' => 'Descrição da tarefa 6',
                'is_completed' => false,
                'updated_at' => now()->subDays(40),
                'created_at' => now(),
            ],
        ]);
    }
}
