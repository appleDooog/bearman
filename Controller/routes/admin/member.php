<?

use App\Http\Controllers\Admin\AdminMemberController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"admin/member"],function(){
    Route::get("list",[AdminMemberController::class,"list"]);
});