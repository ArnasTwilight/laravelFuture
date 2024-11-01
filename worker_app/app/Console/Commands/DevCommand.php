<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$this->prepareData();
        //$this->prepareManyToMany();

        $worker1 = Worker::find(1);
        $worker2 = Worker::find(2);
        $worker3 = Worker::find(3);
        $project = Project::find(1);
//        $projectWorkers = ProjectWorker::where('project_id', $project->id)->get();
//        $workerIds = $projectWorkers->pluck('worker_id')->toArray();
//        $workers = Worker::whereIn('id', $workerIds)->get();

        $project->workers()->detach($worker1->id);

        dd($project->toArray());

        return 0;
    }

    protected function prepareData()
    {
        $position1 = Position::create([
            'title' => 'Developer'
        ]);
        $position2 = Position::create([
            'title' => 'Manager'
        ]);
        $position3 = Position::create([
            'title' => 'Designer'
        ]);

        $workerData1 = [
            'name' => 'Ivan',
            'surname' => 'Ivanov',
            'email' => 'ivanov@gmail.com',
            'position_id' => $position1->id,
            'age' => '25',
            'description' => 'I\'m Ivan',
            'is_married' => false,
        ];

        $workerData2 = [
            'name' => 'Karl',
            'surname' => 'Petrov',
            'position_id' => $position2->id,
            'email' => 'Karl@gmail.com',
            'age' => '28',
            'description' => 'I\'m Karl',
            'is_married' => true,
        ];

        $workerData3 = [
            'name' => 'Kate',
            'surname' => 'Krasavina',
            'email' => 'Kate@gmail.com',
            'position_id' => $position1->id,
            'age' => '18',
            'description' => '',
            'is_married' => false,
        ];

        $workerData4 = [
            'name' => 'Oleg',
            'surname' => 'Olegovich',
            'email' => 'Oleg@gmail.com',
            'position_id' => $position3->id,
            'age' => '29',
            'is_married' => true,
        ];

        $workerData5 = [
            'name' => 'Petr',
            'surname' => 'Petrov',
            'position_id' => $position1->id,
            'email' => 'petr@gmail.com',
            'age' => '30',
            'is_married' => true,
        ];

        $workerData6 = [
            'name' => 'Jon',
            'surname' => 'Veaniaminovich',
            'email' => 'jon@gmail.com',
            'position_id' => $position3->id,
            'age' => '18',
            'is_married' => false,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

        $profileData1 = [
            'worker_id' => $worker1->id,
            'city' => 'Tokyo',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData2 = [
            'worker_id' => $worker2->id,
            'city' => 'Rio',
            'skill' => 'Boss',
            'experience' => 10,
            'finished_study_at' => '2014-06-01',
        ];
        $profileData3 = [
            'worker_id' => $worker3->id,
            'city' => 'Oslo',
            'skill' => 'Frontend',
            'experience' => 1,
            'finished_study_at' => '2021-06-01',
        ];
        $profileData4 = [
            'worker_id' => $worker4->id,
            'city' => 'Omsk',
            'skill' => 'Communication',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData5 = [
            'worker_id' => $worker5->id,
            'city' => 'Berlin',
            'skill' => 'Coder',
            'experience' => 10,
            'finished_study_at' => '2014-06-01',
        ];
        $profileData6 = [
            'worker_id' => $worker6->id,
            'city' => 'Moskov',
            'skill' => 'Designer',
            'experience' => 1,
            'finished_study_at' => '2021-06-01',
        ];

        Profile::create($profileData1);
        Profile::create($profileData2);
        Profile::create($profileData3);
        Profile::create($profileData4);
        Profile::create($profileData5);
        Profile::create($profileData6);
    }


    private function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);

        $workerDesigner1 = Worker::find(4);
        $workerDesigner2 = Worker::find(6);
        $workerFrontend1 = Worker::find(3);
        $workerFrontend2 = Worker::find(5);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);

        $project2 = Project::create([
            'title' => 'Shop'
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerManager->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerDesigner1->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerFrontend1->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerManager->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerDesigner2->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerFrontend2->id,
        ]);
    }
}
