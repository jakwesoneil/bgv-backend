<?php

namespace App\Services;

use App\Models\Lecture;
use App\Repositories\LecturesRepository;

class LecturesService extends LecturesRepository
{
    public function __construct(private Lecture $model)
    {
        parent::__construct($model, [], []);
    }

    public function getListByTeacher($teacherId)
    {
        return $this->model->query()->where('user_id', $teacherId)->get();
    }

    public function create($payload)
    {
        if ($payload['file'] && $payload['file']->isValid()) {
            $destinationPath = public_path('uploads/modules');
            $fileName = $payload['file']->getClientOriginalName();
            $payload['file']->move($destinationPath, $fileName);

            $payload['module_src'] = 'public/uploads/modules/' . $fileName;
        }

        unset($payload['file']);

        return parent::create($payload);
    }

    public function updateModule($file, $id)
    {
        if ($file && $file->isValid()) {
            $destinationPath = public_path('uploads/modules');
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);

            $path = 'public/uploads/modules/' . $fileName;

            $this->model->query()->find($id)->update([
                'module_src' => $path
            ]);

            return $path;
        }

        return 'not updated';
    }
}
