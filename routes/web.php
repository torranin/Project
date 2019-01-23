<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    if(Auth::check()){
        $mainmenu = "home";
        return view('home')->with(array('mainmenu' => $mainmenu));
    }else{
        $mainmenu = "login";
        return view('auth/login')->with(array('mainmenu' => $mainmenu));
    }

});

Auth::routes();

//Controller

//home
Route::get('/home', 'HomeController@index')->name('home');

//sendProblems
Route::get('/sendProblems', 'SendProblemsController@index')->name('sendProblems');
Route::post('/sendProblems/save', 'SendProblemsController@save')->name('sendProblems.save');

//doActive
Route::get('/doActive', 'DoActiveController@index')->name('activity');
Route::post('/doActive/create', 'DoActiveController@save')->name('activity.save');
Route::get('/doActive/onEdit/{id}', 'DoActiveController@onEdit')->name('activity.onEdit');
Route::post('/doActive/edit/{id}', 'DoActiveController@edit')->name('activity.edit');
Route::get('/doActive/onDelete/{id}', 'DoActiveController@onDelete')->name('activity.onDelete');
Route::post('/doActive/delete/{id}', 'DoActiveController@delete')->name('activity.delete');

Route::get('/doActive/{id}/data', function($id, Request $request) {
    return Response::json(\App\DoActive::where('id', $id)->first());
})->name('activity.data')->where(['id' => '[0-9]+']);

//sendDevice
Route::get('/sendDevice', 'SendDeviceController@index')->name('sendDevice');
Route::post('/sendDevice/create', 'SendDeviceController@save')->name('sendDevice.save');
Route::get('/sendDevice/onEdit/{id}', 'SendDeviceController@onEdit')->name('sendDevice.onEdit');
Route::post('/sendDevice/edit/{id}', 'SendDeviceController@edit')->name('sendDevice.edit');
Route::post('/sendDevice/delete/{id}', 'SendDeviceController@delete')->name('sendDevice.delete');

//dataDevice
Route::get('/dataDevice', 'DataDeviceController@index')->name('dataDevice');
Route::post('/dataDevice/create', 'DataDeviceController@save')->name('dataDevice.save');
Route::get('/dataDevice/onEdit/{id}', 'DataDeviceController@onEdit')->name('dataDevice.onEdit');
Route::post('/dataDevice/edit/{id}', 'DataDeviceController@edit')->name('dataDevice.edit');
Route::post('/dataDevice/move/{id}', 'DataDeviceController@move')->name('dataDevice.move');
Route::post('/dataDevice/repair/{id}', 'DataDeviceController@repair')->name('dataDevice.repair');
Route::post('/dataDevice/receive/{id}', 'DataDeviceController@receive')->name('dataDevice.receive');
Route::post('/dataDevice/sell/{id}', 'DataDeviceController@sell')->name('dataDevice.sell');

Route::get('/dataDevice/sell', 'DataDeviceController@selling')->name('dataDevice.selling');

//group
Route::get('/group', 'GroupController@index')->name('group');
Route::post('group/create', 'GroupController@save')->name('group.save');
Route::get('group/onEdit/{id}', 'GroupController@onEdit')->name('group.onEdit');
Route::post('group/edit/{id}', 'GroupController@edit')->name('group.edit');
Route::post('group/delete/{id}', 'GroupController@delete')->name('group.delete');

//device
Route::get('/device', 'DeviceController@index')->name('device');
Route::post('device/create', 'DeviceController@save')->name('device.save');
Route::get('device/onEdit/{id}', 'DeviceController@onEdit')->name('device.onEdit');
Route::post('device/edit/{id}', 'DeviceController@edit')->name('device.edit');
Route::post('device/delete/{id}', 'DeviceController@delete')->name('device.delete');

//report
Route::get('/sendData', 'SendDataController@twelveFile')->name('send.data');
Route::get('/sendData/fortyThreeFileCM', 'SendDataController@fortyThreeFileCM')->name('send.fortyThreeFileCM');
Route::get('/sendData/fortyThreeFileNHSO', 'SendDataController@fortyThreeFileNHSO')->name('send.fortyThreeFileNHSO');

//report
Route::get('/report', 'ReportController@index')->name('report');
Route::get('/report/group', 'ReportController@group')->name('report.group');
Route::get('/report/getGroup/{id}', 'ReportController@getGroup')->name('report.getGroup');

