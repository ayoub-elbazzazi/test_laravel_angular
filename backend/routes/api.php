<?php

use Illuminate\Support\Facades\Route;


Route::resource('tasks', 'TaskController')->except('create', 'edit','show');
Route::post('tasks/filtered','TaskController@tasksFiltered');



///Get getAllTasks path localhost:8000/api/task
///Post getTasksFilteredByStatus path localhost:8000/api/task/filtered params status null/enable/archivate
///Post create new task path localhost:8000/api/task params title,category_id
///Put update  task path localhost:8000/api/task/{id} params newtask
///delete delete  task path localhost:8000/api/task/{id} 