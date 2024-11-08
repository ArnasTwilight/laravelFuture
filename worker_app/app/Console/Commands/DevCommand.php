<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
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
        $this->prepareData();
        $this->prepareManyToMany();

//        $worker = Worker::find(5);
//        $client = Client::find(2);
//
//        $worker->tags()->attach([1, 3]);
//        $client->tags()->attach([2, 3]);

        $tag = Tag::find(3);
        dd($tag->clients->toArray());

        return 0;
    }

    protected function prepareData()
    {
        $client1 = Client::create([
            'name' => 'Bob'
        ]);
        $client2 = Client::create([
            'name' => 'John'
        ]);
        $client3 = Client::create([
            'name' => 'Elena'
        ]);

        $department1 = Department::create([
            'title' => 'IT'
        ]);
        $department2 = Department::create([
            'title' => 'Analytics'
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id
        ]);
        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id
        ]);
        $position3 = Position::create([
            'title' => 'Designer',
            'department_id' => $department1->id
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
            'city' => 'Tokyo',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData2 = [
            'city' => 'Rio',
            'skill' => 'Boss',
            'experience' => 10,
            'finished_study_at' => '2014-06-01',
        ];
        $profileData3 = [
            'city' => 'Oslo',
            'skill' => 'Frontend',
            'experience' => 1,
            'finished_study_at' => '2021-06-01',
        ];
        $profileData4 = [
            'city' => 'Omsk',
            'skill' => 'Communication',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData5 = [
            'city' => 'Berlin',
            'skill' => 'Coder',
            'experience' => 10,
            'finished_study_at' => '2014-06-01',
        ];
        $profileData6 = [
            'city' => 'Moskov',
            'skill' => 'Designer',
            'experience' => 1,
            'finished_study_at' => '2021-06-01',
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);
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
            'title' => 'Blog'
        ]);

        $project1->workers()->attach([
            $workerManager->id,
            $workerBackend->id,
            $workerDesigner1->id,
            $workerFrontend1->id,
        ]);

        $project2->workers()->attach([
            $workerManager->id,
            $workerBackend->id,
            $workerDesigner2->id,
            $workerFrontend2->id,
        ]);
    }
}
