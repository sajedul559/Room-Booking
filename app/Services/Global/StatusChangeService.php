<?php

namespace App\Services\Global;

use Illuminate\Http\Request;
use Modules\HRM\Entities\Department;
use Modules\Pharmacy\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Entities\Staff;

class StatusChangeService {
    public function changeStatus(Request $request):bool
    {
        $model = $this->findModel($request->model);
        if($model) {
            $id = decrypt($request->id);
            $status = $request->status;
            $model->where('id', $id)->update([
                'is_active'=>$status
            ]);
            return true;
        }
        return false;
        
    }
    private function findModel($model_name): ?Model
    {
       $models = $this->allModels();
       return  $model = isset($model[$model_name]) ? $model[$model_name] : null;
    }
    private function allModels():array
    {
        return [
            'departments'   => new Department(),
            'products'  =>new Product(),
            'staffs' => new Staff(),
            'goodowns' => new Warehouse()
          
        ];
    }
}