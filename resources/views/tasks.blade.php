@extends('layout')

@section('content')
<div class="panel-body border w-50">
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{$URL_BASE . '/task'}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Add Task
                    </button>
                </div>
            </div>
        </form>

        <!-- Current Tasks -->
        @if(count($tasks) > 0)
            <div class="panel panel-default">
            <div class="panel-heading">Current Tasks</div>

            <div class="panel-body">
            <!-- Table Headings -->
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
            
            <!-- Table Body -->
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                    <!-- Task name -->
                    <td class="table-text">
                        <div>{{$task->name}}</div>
                    </td>

                    <td>
                        <!-- TODO: Delete Button -->
                        <form method="POST" action="{{$URL_BASE . '/task/' . $task->id}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">Delete Task</button>
                        </form>
                    </td>
                    </tr>
                @endforeach            
            </tbody>
            </table>
            </div>
            </div>

        @endif

    </div>


@endsection