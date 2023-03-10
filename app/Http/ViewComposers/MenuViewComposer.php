<?php
namespace App\Http\ViewComposers;

use App\{Admin,Employee};
use Illuminate\Contracts\View\View;

class MenuViewComposer {
    
    public function compose(View $view) {
        $view->with('counts', [
                'admins' => Admin::count() - 1,
                'employees' => Employee::count(),
          ]);
    }
}

?>