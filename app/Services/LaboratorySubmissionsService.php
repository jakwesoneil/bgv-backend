<?php

namespace App\Services;

use App\Models\LaboratorySubmission;
use App\Repositories\LaboratorySubmissionsRepository;

class LaboratorySubmissionsService extends LaboratorySubmissionsRepository
{
    public function __construct(private LaboratorySubmission $model)
    {
        parent::__construct($model, [], []);
    }

    public function getSubmissionsByLab($laboratoryId)
    {
        return $this->model->query()->with(['lecture', 'student'])->where('lecture_id', $laboratoryId)->get();
    }

    public function submitLaboratory($payload)
    {
        if (count($payload['files']))
        {
            $uploadedFiles = [];

            foreach ($payload['files'] as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('uploads/laboratory-submissions'), $filename);
                $uploadedFiles[] = 'public/uploads/laboratory-submissions/'.$filename;
            }


            return $this->model->query()->create([
                'user_id' => $payload['user_id'],
                'lecture_id' => $payload['lecture_id'],
                'quiz_score' => $payload['quiz_score'],
                'laboratories_data' => json_encode($uploadedFiles)
            ]);
        }
    }

    public function myLaboratories($userId)
    {
        return $this->model->query()->with(['lecture'])->where('user_id', $userId)->get();
    }
}
