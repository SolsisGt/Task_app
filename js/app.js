$(document).ready(function() {
    let edit = false;
    console.log('jQuery is Working');
    $('#task-result').hide();
    fetchTasks();
    $('#search').keyup(function(e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './php/task-search.php',
                type: 'POST',
                data: { search },
                success: function(response) {
                    let tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(task => {
                        template = template + `<li>
                        ${task.name}
                </li>`
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        } else {
            $('#task-result').hide();
        }
    });
    $('#task-form').submit(function(e) {
        const postData = {
            name: $('#name').val(),
            course: $('#course').val(),
            date_end:$('#Task_end').val(),
            time_end:$('#End_time').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };
        let url = edit === false ? './php/task-add.php' : './php/task-edit.php';
        console.log(    );
        $.post(url, postData, function(response) {
            alert(response);
            $('#task-form').trigger('reset');
            fetchTasks();
            edit = false;
        });
        e.preventDefault();
    });

    function fetchTasks() {
        $.ajax({
            url: './php/task-list.php',
            type: 'GET',
            success: function(response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                    <tr class="table-info" taskId="${task.id}">
                    <td>${task.id}</td>
                    <td>
                        <a class="task-item">${task.name}</a>
                    </td>
                    <td>
                        ${task.course}
                    </td>
                    <td>
                        ${task.Task_end}
                    </td>
                    <td>
                        ${task.end_time}
                    </td>
                    <td>${task.description}</td>
                    <td>
                    <button class="task-delete btn btn-danger">DELETE</button>
                    </td>
                    </tr>
                    `
                });
                $('#tasks').html(template);
            }
        });

    }
    $(document).on('click', '.task-delete', function() {
        if (confirm('are you sure you want deleted it?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('./php/task-delete.php', { id }, function(response) {
                alert(response);
                fetchTasks();
            });
        }
    });
    $(document).on('click', '.task-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('./php/task-single.php', { id }, function(response) {
            const task = JSON.parse(response);
            $('#name').val(task.name);
            $('#Task_end').val(task.Task_end);
            $('#End_time').val(task.end_time);
            $('#description').val(task.description);
            $('#taskId').val(task.id);
            edit = true;
        });
    });

});