<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Learner Progress Dashboard</h2>

    <form method="GET" action="<?php echo e(url('/learner-progress')); ?>" class="mb-4">
        <div class="form-group">
            <label for="course">Filter by Course:</label>
            <select name="course" id="course" class="form-control" onchange="this.form.submit()">
                <option value="">-- All Courses --</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($course); ?>" <?php echo e($course == $courseFilter ? 'selected' : ''); ?>><?php echo e($course); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="sort">Sort by Progress:</label>
            <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                <option value="">-- No Sorting --</option>
                <option value="asc" <?php echo e($sortOrder == 'asc' ? 'selected' : ''); ?>>Ascending</option>
                <option value="desc" <?php echo e($sortOrder == 'desc' ? 'selected' : ''); ?>>Descending</option>
            </select>
        </div>
    </form>

    <?php $__currentLoopData = $learners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-header">
                <strong><?php echo e($learner->full_name); ?></strong>
                <span class="float-end">Average Progress: <?php echo e(round($learner->average_progress, 2)); ?>%</span>
            </div>
            <ul class="list-group list-group-flush">
                <?php $__currentLoopData = $learner->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <?php echo e($course['name']); ?> – <?php echo e($course['progress']); ?>%
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/learner-progress.blade.php ENDPATH**/ ?>