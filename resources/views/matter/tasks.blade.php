<table class="table table-hover table-sm">
    <thead class="thead-light">
        <tr>
            <th>Event/Tasks</th>
            <th>Due date</th>
            <th>Done</th>
            <th>Date</th>
            <th>Cost</th>
            <th>Fee</th>
            <th>Cur.</th>
            <th>Time</th>
            <th>Assigned To</th>
            <th>Notes</th>
            <th style="width: 24px;">&nbsp;</th>
        </tr>
    </thead>
    @foreach ( $events as $event )
    <tbody>
        <tr class="reveal-hidden">
            <td colspan="11">
                <span style="position: relative; left: -10px; margin-right: 10px;">{{ $event->info->name . ": " . $event->event_date }}</span>
                <a href="javascript:void(0);" id="addTaskToEvent" class="hidden-action" data-event_id="{{ $event->id }}" title="Add task to {{ $event->info->name }}">
                    &oplus;
                </a>
                <a href="javascript:void(0);" class="hidden-action text-danger ml-2" id="deleteEvent" data-event_id="{{ $event->id }}" title="Delete event">
                    &CircleMinus;
                </a>
            </td>
        </tr>
        @foreach ($event->tasks as $task)
        <tr class="reveal-hidden {{ $task->done ? 'text-success' : 'text-danger' }}" data-id="{{ $task->id }}">
            <td nowrap>
                {{ $task->info->name }} <input type="text" class="form-control-sm noformat" name="detail" value="{{ $task->detail }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" size="10" name="due_date" value="{{ $task->due_date }}">
            </td>
            <td>
                <input type="checkbox" name="done" {{ $task->done ? 'checked' : '' }}>
            </td>
            <td>
                <input type="text" class="form-control noformat" size="10" name="done_date" value="{{ $task->done_date }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" size="6" name="cost" value="{{ $task->cost }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" size="6" name="fee" value="{{ $task->fee }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" size="3" name="currency" value="{{ $task->currency }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" size="6" name="time_spent" value="{{ $task->time_spent }}">
            </td>
            <td class="ui-front">
                <input type="text" class="form-control noformat" size="12" name="assigned_to" value="{{ $task->assigned_to }}">
            </td>
            <td>
                <input type="text" class="form-control noformat" name="notes" value="{{ $task->notes }}">
            </td>
            <td>
                <a href="javascript:void(0);" class="hidden-action text-danger" id="deleteTask" title="Delete task">&CircleMinus;</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endforeach
</table>

<template id="addTaskFormTemplate">
    <tr>
        <td colspan="11">
            <form id="addTaskForm" class="form-inline">
                <input type="hidden" name="trigger_id" value="" id="trigger_id" />
                <input type="hidden" name="code" value="" id="task_code" />
                <div class="input-group">
                    <div class="ui-front">
                        <input type="text" class="form-control form-control-sm" size="12" name="name" placeholder="Name">
                    </div>
                    <input type="text" class="form-control form-control-sm" size="16" name="detail" placeholder="Detail">
                    <div class="ui-front">
                        <input type="text" class="form-control form-control-sm" size="10" name="due_date" placeholder="Date">
                    </div>
                    <input type="text" class="form-control form-control-sm" size="6" name="cost" placeholder="Cost">
                    <input type="text" class="form-control form-control-sm" size="6" name="fee" placeholder="Fee">
                    <input type="text" class="form-control form-control-sm" size="3" name="currency" placeholder="EUR">
                    <input type="text" class="form-control form-control-sm" size="6" name="time_spent" placeholder="Time">
                    <div class="ui-front">
                        <input type="text" class="form-control form-control-sm" size="10" name="assigned_to" placeholder="Assigned to">
                    </div>
                    <input type="text" class="form-control form-control-sm" size="20" name="notes" placeholder="Notes">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary btn-sm" id="addTaskSubmit">&check;</button>
                        <button type="reset" class="btn btn-outline-primary btn-sm" onClick="$(this).parents('tr').html('')">&times;</button>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</template>
