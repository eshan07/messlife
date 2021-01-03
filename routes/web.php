<?php

Route::get('/reports','Backend\CostController@report')->name('reports');
Route::get('/printmealreport','Backend\CostController@printmealreport')->name('printmealreport');
Route::post('/addpayment','Backend\CostController@addpayment')->name('addpayment');

Route::get('/paymentview','Backend\CostController@paymentview')->name('paymentview');





Route::group(['middleware' => 'auth'], function () {
Route::get('/mealcost','Backend\MealController@mealCost')->name('mealcost');
Route::post('/mealcostadd','Backend\MealController@membersmealcost')->name('mealcostadd');
Route::get('/mealcostview','Backend\MealController@mealcostview')->name('mealcostview');
Route::post('/mealcost/{id}','Backend\MealController@editmealbalance')->name('editmealbalance');
Route::get('/costs','Backend\CostController@allCost')->name('costs');
Route::post('/addcosts','Backend\CostController@addallCost')->name('addcosts');

Route::get('/delete-allcost/{id}','Backend\CostController@deletetotalcost')->name('deletetotalcost');
// <!=============Start Backend ==============!>
Route::get('/admin','Backend\HomeController@home')->name('admin');

Route::get('/members','Backend\UserController@member')->name('members');
Route::get('/printmember','Backend\UserController@printmember')->name('printmember');
Route::get('/printcost','Backend\CostController@printcost')->name('printcost');
Route::post('/member/add','Backend\UserController@addMember')->name('add.member');
Route::post('/member/edited','Backend\UserController@editprofile')->name('editprofile');
Route::post('/member/{id}','Backend\UserController@editmember')->name('editmember');
Route::get('/delete-user/{id}','Backend\UserController@deletemember')->name('deletemember');

Route::get('/disciplinaries','Backend\HomeController@disciplinary')->name('disciplinaries');
Route::post('/add/disciplinary','Backend\HomeController@addDisciplinary')->name('add.disciplinary');

Route::get('/notices','Backend\HomeController@notice')->name('notices');
Route::post('/add/notice','Backend\HomeController@addNotice')->name('add.notice');

Route::get('/meals','Backend\MealController@viewMeal')->name('meals');
Route::get('/current-day-meals','Backend\MealController@currentdaymeals')->name('current-day-meals');
Route::get('/meals-monthly','Backend\MealController@monthlyMeal')->name('mealsMonthly');
Route::post('/add/meals','Backend\MealController@addMeal')->name('add.meals');

Route::get('/bazaars','Backend\BazaarController@viewBazaar')->name('bazaars');


Route::get('/MyBazaar','Backend\BazaarController@myBazaar')->name('MyBazaar');

Route::get('/MonthlyBazaar','Backend\BazaarController@monthlyBazaar')->name('MonthlyBazaar');
Route::get('/BazaarCost','Backend\BazaarController@bazaarCost')->name('BazaarCost');
Route::get('/printschedule','Backend\BazaarController@printschedule')->name('printschedule');


Route::post('/add/bazaars','Backend\BazaarController@addBazaar')->name('add.bazaars');
Route::get('/delete-bazaar/{id}','Backend\BazaarController@deletebazaar')->name('deletebazaar');
Route::post('/bazaarscost','Backend\BazaarController@bazaarscost')->name('bazaarscost');


Route::get('/monthlyview','Backend\BazaarController@monthlyview')->name('monthlyview');
Route::get('/Monthly-Bazaar-Cost','Backend\BazaarController@monthlyBazaarCost')->name('monthlyBazaarCost');
Route::get('/User-Profile','Frontend\HomeController@viewProfile')->name('userProfile');

Route::get('/logout','Frontend\HomeController@logout')->name('logout');

});
// <!=============Stop Backend ==============!>


// <!=============Start Registration / Log in / Log Out ==============!>
Route::get('/registration','Frontend\HomeController@registration')->name('registration');
Route::post('/signup','Frontend\HomeController@doRegistration')->name('do.registration');
Route::get('/login','Frontend\HomeController@login')->name('login');
Route::post('/signin','Frontend\HomeController@dologin')->name('do.login');
// <!=============Stop Registration / Log in / Log Out ==============!


// <!=============Start FRONTEND ==============!>
Route::get('/','Frontend\HomeController@home')->name('home');
Route::get('/manager','Frontend\HomeController@manager')->name('manager');
Route::get('/member','Frontend\HomeController@member')->name('member');
Route::get('/contact','Frontend\HomeController@contact')->name('contact');
Route::post('/feedback','Frontend\HomeController@sendfeedback')->name('sendfeedback');
Route::get('/features','Frontend\HomeController@features')->name('features');
Route::get('/about','Frontend\HomeController@about')->name('about');
// <!=============Stop FRONTEND ==============!>



?>
