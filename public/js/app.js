$("#loader").hide();
getTask();
function getTask(){
    $.ajax({
        type: "GET",
        url: '/reloadTodo',
        success: function(res){
            $("#showData").html(res.response);
            $("#loader").hide();
        },
        error: function(err){
            console.log(err);
            $("#loader").hide();
        }
    });
}
function addTodo(){
    if($("#input_task").val() === "") {
        alert("required todo");
        return false;
    }
    $("#loader").show();
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: $("#form-task").serializeArray(),
        url: '/task',
        success: function(msg){
            getTask();
        },
        error: function(err){
            console.log(err);
            $("#loader").hide();
        }
    });
}
$("#task-cek").on('keypress',function(e) {
    if(e.which == 13) {
        addTodo();
        return false;
    }
});
$("#add-todo").click(function(){
    addTodo();
})
$("#showData").on('click', '.tasks', function () {
    const param = $(this).attr('uniq');
    // $("#through"+param).css("text-decoration", "line-through");
    // $("#through"+param).css("text-decoration", "none");
    if($(this).prop("checked") == true) {
        $("#loader").show();
        $.ajax({
            type: "PATCH",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {"iscompleted":1},
            url: `/task/${param}`,
            success: function(msg){
                getTask();
            },
            error: function(err){
                console.log(err);
                $("#loader").hide();
            }
        });
    }else{
        $("#loader").show();
        $.ajax({
            type: "PATCH",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {"iscompleted":0},
            url: `/task/${param}`,
            success: function(msg){
                getTask();
            },
            error: function(err){
                console.log(err);
                $("#loader").hide();
            }
        });
    }
    
});
$("#delete-todo").click(function(){
    const mapParam = $('input[name="checked[]"]:checked').map(function(){ 
        return this.value; 
    }).get();
    $("#loader").show();
    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {"checked":mapParam},
        url: '/task',
        success: function(msg){
            getTask();
        },
        error: function(err){
            console.log(err);
            $("#loader").hide();
        }
    });
})