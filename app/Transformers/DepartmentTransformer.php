<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
{
    public function transform(Department $department)
    {
        return [
            'id' => $department->id,
            'dept_no' => $department->dept_no,
            'name' => $department->name,
            'p_dept' => $department->p_dept,
            'remark' => $department->remark,
            'is_verify' => $department->is_verify,
            'status' => $department->status,
            'created_at' => $department->created_at
                                    ->toDateTimeString(),
            'updated_at' => $department->updated_at
                                    ->toDateTimeString(),
        ];
    }
}