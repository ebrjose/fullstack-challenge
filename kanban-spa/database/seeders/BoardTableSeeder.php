<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Seeder;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boards = Board::factory(20)->create();



        $boards->each(function ($board) {
            $taskListBuffer = TaskList::factory()->make(['title' => 'Buffer', 'index' => 1]);
            $taskListWorking = TaskList::factory()->make(['title' => 'Working', 'index' => 2]);
            $taskListDone = TaskList::factory()->make(['title' => 'Done', 'index' => 3, 'is_done' => true]);

            $bufferList = $board->taskList()->save($taskListBuffer);
            $workingList = $board->taskList()->save($taskListWorking);
            $doneList = $board->taskList()->save($taskListDone);

            $task1 = Task::factory()->make(['title' => 'Agregar subtareas al kanban', 'index' => 1]);
            $task2 = Task::factory()->make(['title' => 'Testing Kanban', 'index' => 1]);
            $task3 = Task::factory()->make();

            $bufferList->tasks()->save($task1);
            $workingList->tasks()->save($task2);
            $doneList->tasks()->save($task3);
        });
    }
}
