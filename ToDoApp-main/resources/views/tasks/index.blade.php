<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/task.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    <header>
        <h1>ToDoApp<h1>
        <a href="{{ route('login.index') }}" class="logout-icon"><i class='bx bx-log-out'></i></a>
        <a href="#" class="settings-icon"><i class='bx bx-cog'></i></a>
        
    </header>
    <div class="create-task-container">
        <div class="create-task">
            <h2>Create Task</h2>
            <form method="post" id="createTaskForm" action="{{ route('tasks.store')}}"> 
                @csrf
                @method('post')
                <div class="input-box">
                    <input type="text" name="title" placeholder="Title" required>
                </div>
                <div class="input-box">
                    <textarea name="description" placeholder="Description" required></textarea>
                </div>
                <div class="check-box">
                <h3>Status</h3>
                <input type="checkbox" id="status1" name="status1">
                <label for="status"> completed</label><br>
                <input type="checkbox" id="status2" name="status2">
                <label for="status"> in progress</label><br>
                </div>
                <button type="submit" id="createTaskBtn">Create</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const createTaskForm = document.getElementById('createTaskForm');
        const createTaskBtn = document.getElementById('createTaskBtn');

        createTaskForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            const formData = new FormData(createTaskForm);

            // Make AJAX request
            fetch('/tasks', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
                }
            })
            .then(response => {
                if (response.ok) {
                    // Note created successfully
                    alert('Task submitted successfully!');
                    // Optionally, you can redirect or update the UI here
                } else {
                    // Error creating note
                    alert('Error creating task');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error creating task');
            });
        });
    });

    </script>
</body>
</html>