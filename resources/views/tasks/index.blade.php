@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Your HTML content above this line -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert-success").fadeOut();
        }, 5000); // Disappears after 5 seconds (adjust the time as needed)
    });
</script>

</body>



@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
    <div class="container-with-background" style="background-image: url('{{ asset('images/bg-tb1.PNG') }}');">
        <h1>Task List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td class="action-column">
                            <a href="/tasks/{{ $task->id }}/edit" class="btn btn-primary">
                                <i class="fas fa-edit" title="Edit" style="margin-right: 10px; color: blue;"></i> 
                            </a>

                           
                            <a href="#" onclick="deleteTask('{{ $task->id }}'); return false;">
                              <i class="fas fa-trash-alt" title="Delete" style="color: red;"></i>
                            </a>

                           <script>
                              function deleteTask(taskId) {
                                  if (confirm('Are you sure you want to delete this task?')) {
                                    // Perform the delete action, e.g., submit a form
                                    // Here, I'm assuming you have a form to handle the delete action
                                   var form = document.createElement('form');
                                   form.setAttribute('method', 'POST');
                                   form.setAttribute('action', '/tasks/' + taskId);
                                   form.style.display = 'none';

                                   var csrfField = document.createElement('input');
                                   csrfField.setAttribute('type', 'hidden');
                                   csrfField.setAttribute('name', '_token');
                                   csrfField.setAttribute('value', '{{ csrf_token() }}');
                                   form.appendChild(csrfField);

                                   var methodField = document.createElement('input');
                                   methodField.setAttribute('type', 'hidden');
                                   methodField.setAttribute('name', '_method');
                                   methodField.setAttribute('value', 'DELETE');
                                   form.appendChild(methodField);

                                   document.body.appendChild(form);
                                   form.submit();
                               }
                             }
                        </script>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a href="/tasks/create" class="btn btn-success">
            <i class="fas fa-plus" title="Create New Task"></i> <b>Create New Task
        </a>
    
    </div>
  </div>
@endsection
