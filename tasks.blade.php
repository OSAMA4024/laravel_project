<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Tasks</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; padding: 0 16px; }
        form.add { display: flex; gap: 8px; margin-bottom: 20px; }
        form.add input { flex: 1; padding: 8px; }
        li { display: flex; align-items: center; gap: 8px; padding: 6px 0; }
        li span { flex: 1; }
        li.done span { text-decoration: line-through; color: #888; }
        ul { list-style: none; padding: 0; }
        .error { color: #c00; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>My Tasks</h1>

    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror

    <form class="add" method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="New task..." required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @forelse ($tasks as $task)
            <li class="{{ $task->done ? 'done' : '' }}">
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" onchange="this.form.submit()" {{ $task->done ? 'checked' : '' }}>
                </form>
                <span>{{ $task->title }}</span>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @empty
            <li>No tasks yet.</li>
        @endforelse
    </ul>
</body>
</html>
