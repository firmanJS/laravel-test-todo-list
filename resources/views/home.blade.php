@include('partials.head')
<div class="container">
    <div class="col-md-8">
        <h1>Todo List Test Firman Abdul Hakim</h1>
        <form id="form-task">
            <div class="form-group">
                <input type="text" id="input_task" class="form-control" id="task-cek" name="task" placeholder="Type in a new todo...">
            </div>
            <div class="form-group">
                <button type="button" id="add-todo" class="btn btn-primary">Add Todo</button>
            </div>
            <center id="loader" style="margin-top: -15px;margin-bottom: -15px;">
                <img src="{{URL::asset('image/loading.gif')}}" style="width:100px;height:100px;">
            </center>
        </form>
        <hr>
        <div id="showData">
						
        </div>
        <button type="button" id="delete-todo" class="btn btn-danger">Delete Selected</button>
    </div>
</div>
@include('partials.footer')
