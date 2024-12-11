<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function test(Request $request)
    {
        // dd('ok');
        $routes = Route::getRoutes();
        $data = [];
        try {
            DB::table('permissions')->delete();
 
            DB::beginTransaction();
            foreach ($routes as $key => $route) {
                $explode = explode("/", $route->uri);
            
                // Extract the HTTP method
                $method = isset($route->methods()[0]) ? $route->methods()[0] : null;
            
                // Determine parent route based on the first segment of the URI
                $parentUri = count($explode) > 1 ? $explode[0] : null;
            
                // Check if the parent route exists in the database
                $parentPermission = $parentUri ? Permission::query()
                    ->where('route', 'LIKE', $parentUri . '%')
                    ->first() : null;
            
                $permission = Permission::query()->updateOrCreate([
                    'name'        => ucfirst(textReplace($route->getName(), ".", " ")),
                    'section'     => ucfirst(textReplace($route->getName(), ".", " ")),
                    'route'       => $route->getName() ?? $route->uri(),
                    'method_type' => $method,
                ], [
                    'parent_route' => $parentPermission ? $parentPermission->route : null,
                    'child_route'  => $parentPermission ? $route->getName() ?? $route->uri() : null,
                    'is_active'    => 1,
                ]);
            }
            

            DB::commit();

        }
        catch (\Throwable $e){
            dd($e->getMessage());
            DB::rollBack();
        }
    }
}
