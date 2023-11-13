<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('schedule', 'Backend\ScheduleController@index')->name('schedule.index');
Route::post('schedule', 'Backend\ScheduleController@update')->name('schedule.update');
Route::get('lang/{lang}', 'Frontend\HomeController@lang')->name('lang');
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('candidates', 'Frontend\CandidateController@index')->name('home.candidates');
Route::get('result', 'Frontend\CandidateController@result')->name('home.candidates.result');

/** vote route */
Route::get('vote', 'Frontend\VoteController@index')->name('home.vote');
Route::post('vote/check', 'Frontend\VoteController@check')->name('home.vote.check');
Route::get('vote/detail', 'Frontend\VoteController@detail')->name('home.vote.detail');
Route::post('vote/store', 'Frontend\VoteController@store')->name('home.vote.store');
Route::post('vote/store2', 'Frontend\VoteController@store2')->name('home.vote.store2');
Route::post('vote/note', 'Frontend\VoteController@note')->name('home.vote.note');
/** end vote route */

Route::get('teams', 'Frontend\TeamController@index')->name('home.teams');

Route::get('check-vote', 'Frontend\VoteController@checkMember')->name('home.member.checking');
Route::post('member/check', 'Frontend\VoteController@checkMemberData')->name('home.member.check');

Route::get('json/chart-member', 'Frontend\CandidateController@chartMemberByState')->name('home.chartMemberByState');
Route::get('json/chart-candidate', 'Frontend\CandidateController@chartCandidate')->name('home.chartCandidate');
Route::get('json/chart-vote-by-day', 'Frontend\CandidateController@chartVoteByDay')->name('home.chartVoteByDay');


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    /** route beranda */
    Route::get('/', 'Backend\HomeController@index')->name('backend');
    Route::get('json/chart-member-by-state', 'Backend\HomeController@chartMemberByState')->name('backend.chartMemberByState');
    Route::get('json/chart-candidate', 'Backend\HomeController@chartCandidate')->name('backend.chartCandidate');
    Route::get('json/chart-vote-by-day', 'Backend\HomeController@chartVoteByDay')->name('backend.chartVoteByDay');
    Route::get('json/chart-candidate2', 'Backend\HomeController@chartCandidate2')->name('backend.chartCandidate2');
    Route::get('json/chart-candidate3', 'Backend\HomeController@chartCandidate3')->name('backend.chartCandidate3');
    Route::get('json/chart-candidate4', 'Backend\HomeController@chartCandidate4')->name('backend.chartCandidate4');
    Route::get('json/chart-candidate5', 'Backend\HomeController@chartCandidate5')->name('backend.chartCandidate5');
    Route::get('json/chart-vote-by-day2', 'Backend\HomeController@chartVoteByDay2')->name('backend.chartVoteByDay2');

    /** route users */
    Route::get('users', 'Backend\UserController@index')->middleware(['permission:read-users'])->name('users');
    Route::get('users/create', 'Backend\UserController@create')->middleware(['permission:create-users'])->name('users.create');
    Route::get('users/{id}', 'Backend\UserController@view')->middleware(['permission:read-users'])->name('users.view');
    Route::post('users/store', 'Backend\UserController@store')->middleware(['permission:create-users'])->name('users.store');
    Route::get('users/{id}/edit', 'Backend\UserController@edit')->middleware(['permission:edit-users'])->name('users.edit');
    Route::post('users/{id}/update', 'Backend\UserController@update')->middleware(['permission:edit-users'])->name('users.update');
    Route::post('users/delete', 'Backend\UserController@delete')->middleware(['permission:delete-users'])->name('users.delete');

    /** route roles */
    Route::get('roles', 'Backend\RoleController@index')->middleware(['permission:read-roles'])->name('roles');
    Route::get('roles/create', 'Backend\RoleController@create')->middleware(['permission:create-roles'])->name('roles.create');
    Route::get('roles/{id}', 'Backend\RoleController@view')->middleware(['permission:read-roles'])->name('roles.view');
    Route::post('roles/store', 'Backend\RoleController@store')->middleware(['permission:create-roles'])->name('roles.store');
    Route::get('roles/{id}/edit', 'Backend\RoleController@edit')->middleware(['permission:edit-roles'])->name('roles.edit');
    Route::post('roles/{id}/update', 'Backend\RoleController@update')->middleware(['permission:edit-roles'])->name('roles.update');
    Route::post('roles/delete', 'Backend\RoleController@delete')->middleware(['permission:delete-roles'])->name('roles.delete');

    /** route menus */
    Route::get('menus', 'Backend\MenuController@index')->middleware(['permission:read-menus'])->name('menus');
    Route::get('menus/create', 'Backend\MenuController@create')->middleware(['permission:create-menus'])->name('menus.create');
    Route::get('menus/{id}', 'Backend\MenuController@view')->middleware(['permission:read-menus'])->name('menus.view');
    Route::post('menus/store', 'Backend\MenuController@store')->middleware(['permission:create-menus'])->name('menus.store');
    Route::get('menus/{id}/edit', 'Backend\MenuController@edit')->middleware(['permission:edit-menus'])->name('menus.edit');
    Route::post('menus/{id}/update', 'Backend\MenuController@update')->middleware(['permission:edit-menus'])->name('menus.update');
    Route::post('menus/delete', 'Backend\MenuController@delete')->middleware(['permission:delete-menus'])->name('menus.delete');

    /** route teams */
    Route::get('teams', 'Backend\TeamController@index')->middleware(['permission:read-teams'])->name('teams');
    Route::get('teams/create', 'Backend\TeamController@create')->middleware(['permission:create-teams'])->name('teams.create');
    Route::get('teams/{id}', 'Backend\TeamController@view')->middleware(['permission:read-teams'])->name('teams.view');
    Route::post('teams/store', 'Backend\TeamController@store')->middleware(['permission:create-teams'])->name('teams.store');
    Route::get('teams/{id}/edit', 'Backend\TeamController@edit')->middleware(['permission:edit-teams'])->name('teams.edit');
    Route::post('teams/{id}/update', 'Backend\TeamController@update')->middleware(['permission:edit-teams'])->name('teams.update');
    Route::post('teams/delete', 'Backend\TeamController@delete')->middleware(['permission:delete-teams'])->name('teams.delete');

    /** route members */
    Route::get('members', 'Backend\MemberController@index')->middleware(['permission:read-members'])->name('members');
    Route::get('members/datatable', 'Backend\MemberController@jsonDatatable')->middleware(['permission:read-members'])->name('members.datatable');
    Route::get('members/create', 'Backend\MemberController@create')->middleware(['permission:create-members'])->name('members.create');
    Route::get('members/{id}', 'Backend\MemberController@view')->middleware(['permission:read-members'])->name('members.view');
    Route::post('members/store', 'Backend\MemberController@store')->middleware(['permission:create-members'])->name('members.store');
    Route::get('members/{id}/edit', 'Backend\MemberController@edit')->middleware(['permission:edit-members'])->name('members.edit');
    Route::post('members/{id}/update', 'Backend\MemberController@update')->middleware(['permission:edit-members'])->name('members.update');
    Route::post('members/delete', 'Backend\MemberController@delete')->middleware(['permission:delete-members'])->name('members.delete');
    Route::post('members/import', 'Backend\MemberController@import')->middleware(['permission:create-members'])->name('members.import');

    /** route candidates */
    Route::get('candidates', 'Backend\CandidateController@index')->middleware(['permission:read-candidates'])->name('candidates');
    Route::get('candidates/create', 'Backend\CandidateController@create')->middleware(['permission:create-candidates'])->name('candidates.create');
    Route::get('candidates/{id}', 'Backend\CandidateController@view')->middleware(['permission:read-candidates'])->name('candidates.view');
    Route::post('candidates/store', 'Backend\CandidateController@store')->middleware(['permission:create-candidates'])->name('candidates.store');
    Route::get('candidates/{id}/edit', 'Backend\CandidateController@edit')->middleware(['permission:edit-candidates'])->name('candidates.edit');
    Route::post('candidates/{id}/update', 'Backend\CandidateController@update')->middleware(['permission:edit-candidates'])->name('candidates.update');
    Route::post('candidates/delete', 'Backend\CandidateController@delete')->middleware(['permission:delete-candidates'])->name('candidates.delete');

    /** route feedback */
    Route::get('feedback', 'Backend\FeedbackController@index')->middleware(['permission:read-feedback'])->name('feedback');

    /** route verification member */
    Route::get('verification', 'Backend\VerificationController@index')->middleware(['permission:read-verification'])->name('verification');

    /** route voting member */
    Route::get('voting', 'Backend\VotingController@index')->middleware(['permission:read-voting'])->name('voting');
    Route::get('voting/export', 'Backend\VotingController@export')->middleware(['permission:read-voting'])->name('voting.export');
});
