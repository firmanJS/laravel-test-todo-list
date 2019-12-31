<ul class="list-group">
  @foreach($tasks as $task)
	  <li class="list-group-item">
      <input type="checkbox" class="tasks" value="{{ $task->id }}" name="checked[]"
      uniq="{{ $task->id }}" @if($task->iscompleted == "1") checked @endif><span id="through{{ $task->id }}"
      style="margin-left:5px;font-weight:bold;@if($task->iscompleted == "1") text-decoration:line-through; @endif">{{ $task->task }} [X]</span>
    </li>
  @endforeach
</ul>