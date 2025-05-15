@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Learner Progress Dashboard</h2>

    <form method="GET" action="{{ url('/learner-progress') }}" class="mb-4">
        <div class="form-group">
            <label for="course">Filter by Course:</label>
            <select name="course" id="course" class="form-control" onchange="this.form.submit()">
                <option value="">-- All Courses --</option>
                @foreach($courses as $course)
                    <option value="{{ $course }}" {{ $course == $courseFilter ? 'selected' : '' }}>{{ $course }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="sort">Sort by Progress:</label>
            <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                <option value="">-- No Sorting --</option>
                <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </form>

    @foreach ($learners as $learner)
        <div class="card mb-3">
            <div class="card-header">
                <strong>{{ $learner->full_name }}</strong>
                <span class="float-end">Average Progress: {{ round($learner->average_progress, 2) }}%</span>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($learner->courses as $course)
                    <li class="list-group-item">
                        {{ $course['name'] }} – {{ $course['progress'] }}%
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection