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
            <?php echo e(__('Liste Programmes')); ?>

            <a href="/dashboard" class="btn btn-primary">Home</a>
        <a href="<?php echo e(route('programme.create')); ?>" class="btn btn-primary">Ajouter</a>
        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">Liste des Programmes</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th>Document</th>
                                    <th>choiX</th>
                                    <th>candidat</th>
                                    <th>secteur</th>
                                    <th>Action</th>
                                </tr>

                             <?php $__currentLoopData = $programme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                            <td><?php echo e($prod->id); ?></td>
                                            <td><?php echo e($prod->titre); ?></td>
                                            <td><?php echo e($prod->contenu); ?></td>
                                            <td><?php echo e($prod->document); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('programme.vote', $prod->id)); ?>" class="btn btn-info">Vote</a>
                                            </td>
                                            <td>
                                                <?php if($prod->candidat): ?>
                                                    <?php echo e($prod->candidat->Nom); ?> <?php echo e($prod->candidat->Prenom); ?>

                                                <?php else: ?>
                                                    Aucun candidat associé
                                                <?php endif; ?>
                                            </td>


                                            <td> <?php if($prod->secteur): ?>
                                                <?php echo e($prod->secteur->libelle); ?>


                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a href="<?php echo e(route('programme.create')); ?>" class="btn btn-warning ms-3"
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Property::class)): ?>
                                                <?php if(auth()->user()->is_admin): ?>
                                                    style="display: inline-block;"
                                                <?php else: ?>
                                                    style="display: none;"
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        >Ajouter</a>
                                        <a href="<?php echo e(route('programme.edit', $prod->id)); ?>" class="btn btn-warning ms-3"
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', App\Models\Property::class)): ?>
                                                        <?php if(auth()->user()->is_admin): ?>
                                                            style="display: inline-block;"
                                                        <?php else: ?>
                                                            style="display: none;"
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                >editer</a>

                                                <form action="<?php echo e(route('programme.destroy', $prod->id)); ?>" method="post"
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Models\Property::class)): ?>
                                                    <?php if(auth()->user()->is_admin): ?>
                                                        style="display: inline-block;"
                                                    <?php else: ?>
                                                        style="display: none;"
                                                    <?php endif; ?>
                                                <?php endif; ?>>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                </form>
                                            </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      



                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<?php /**PATH C:\Users\user\Desktop\Laravel-programme\system-sondages\resources\views/programmes/liste.blade.php ENDPATH**/ ?>