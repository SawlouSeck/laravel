<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Ajouter Programmes')); ?>

            <a href="/dashboard" class="btn btn-primary">Home</a>
            <a class="btn btn-primary" href="<?php echo e(route('programme.index')); ?>">Liste</a>
        </h2>
     <?php $__env->endSlot(); ?><div class="form-container">
        <div class="form-group">

    </div>
        <?php if(session('status')): ?>
        <div class="alert alert-success"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="alert alert-danger"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

         <form action="<?php echo e(route('programme.store')); ?>" method="POST" class="form-group" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="candidat_id">
                      <option selected>Choisir un Candidat</option>
                      <?php $__currentLoopData = $candidat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cand->id); ?>"><?php echo e($cand->Nom); ?> <?php echo e($cand->Prenom); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="secteur_id">
                      <option selected>Choisir un secteur</option>
                      <?php $__currentLoopData = $secteur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($sect->id); ?>"><?php echo e($sect->libelle); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>

                    <div class="form-group">
                        <label for="title">titre :</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu :</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="document">Document :</label>
                        <input type="file" class="form-control" id="document" name="document" accept=".pdf, .doc, .docx" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Publier</button>
                    <a href="<?php echo e(route('programme.index')); ?>" class="btn btn-primary">Retourner à la liste des candidats</a>
            </div>
        </div>
    </div>
</form>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Desktop\Laravel-programme\system-sondages\resources\views/programmes/add.blade.php ENDPATH**/ ?>