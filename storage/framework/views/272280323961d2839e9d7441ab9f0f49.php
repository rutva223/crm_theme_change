<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo e(asset('public/logo_image/FansClubLogo.png')); ?>" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">FANSCL<i class='bx bxs-heart fs-20 text-danger'></i>B</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="mm-active-class <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>" class="">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <?php if(\Auth::user()->type == 'company'): ?>
            <li
                class="mm-active-class <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'client' || Request::segment(1) == 'userlogs' || Request::segment(1) == 'clientlogs' ? 'active' : ''); ?>">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-user'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('Staff')); ?></div>
                </a>
                <ul>
                    <li
                        class="mm-active-class <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'userlogs' ? 'active ' : ''); ?>">
                        <a href="<?php echo e(route('employee.index')); ?>"><i
                                class="bx bx-right-arrow-alt"></i><?php echo e(__('Employee')); ?></a>
                    </li>

                    <li
                        class="mm-active-class <?php echo e(Request::segment(1) == 'client' || Request::segment(1) == 'clientlogs' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('client.index')); ?>"><i
                                class="bx bx-right-arrow-alt"></i><?php echo e(__('Client')); ?></a>
                    </li>
                </ul>
            </li>
        <?php elseif(\Auth::user()->type == 'employee'): ?>
            <li class="mm-active-class <?php echo e(Request::segment(1) == 'employee' ? 'active ' : ''); ?>">
                <a href="<?php echo e(route('employee.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="">
                    <div class="parent-icon"><i class='ti ti-accessible'></i>
                    </div>
                    <div class="menu-title">My Profile</div>
                </a>
            </li>
        <?php elseif(\Auth::user()->type == 'client'): ?>
            <li class="mm-active-class <?php echo e(Request::segment(1) == 'client' ? 'active ' : ''); ?>">
                <a href="<?php echo e(route('client.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="">
                    <div class="parent-icon"><i class='ti ti-home'></i>
                    </div>
                    <div class="menu-title">My Profile</div>
                </a>
            </li>
        <?php endif; ?>

        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee' || \Auth::user()->type == 'client'): ?>
            <li
                class="mm-active-class <?php echo e(Request::segment(1) == 'lead' || Request::segment(1) == 'deal' || Request::segment(1) == 'estimate' || Request::segment(1) == 'form_builder' || Request::segment(1) == 'form_response' ? 'active dash-trigger' : ''); ?>">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='ti ti-layout-2'></i></div>
                    <div class="menu-title"><?php echo e(__('PreSale')); ?></div>
                </a>
                <ul>
                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                        <li class="mm-active-class <?php echo e(Request::segment(1) == 'lead' ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('lead')) ? route(\Auth::user()->getDefualtViewRouteByModule('lead')) : route('lead.index')); ?>"><i
                                class="bx bx-right-arrow-alt"></i><?php echo e(__('Lead')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client'): ?>
                        <li class="mm-active-class <?php echo e(Request::segment(1) == 'deal' ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('deal')) ? route(\Auth::user()->getDefualtViewRouteByModule('deal')) : route('deal.index')); ?>"><i
                                class="bx bx-right-arrow-alt"></i><?php echo e(__('Deal')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'client' || \Auth::user()->type == 'employee'): ?>
            <li
                class="mm-active-class <?php echo e(Request::segment(1) == 'project' || Request::segment(1) == 'allTask' || Request::segment(1) == 'allTimesheet' ? 'active dash-trigger' : ''); ?>">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-list-check'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('Project')); ?></div>
                </a>
                <ul>
                    <li
                        class="mm-active-class <?php echo e(Request::segment(1) == 'project' && Request::segment(2) != 'allTask' && Request::segment(2) != 'allTaskKanban' && Request::segment(2) != 'allTimesheet' ? 'active  dash-trigger' : ''); ?>">
                        <a href="<?php echo e(route('project.index')); ?>"><i
                                class="bx bx-right-arrow-alt"></i><?php echo e(__('All Project')); ?></a>
                    </li>
                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(2) == 'allTask' || Request::segment(2) == 'allTaskKanban' ? 'active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(!empty(\Auth::user()->getDefualtViewRouteByModule('all task')) ? route(\Auth::user()->getDefualtViewRouteByModule('all task')) : route('project.all.task')); ?>"><i
                                    class="bx bx-right-arrow-alt"></i><?php echo e(__('Task')); ?></a>
                        </li>
                        <li class="dash-item dash-hasmenu <?php echo e(Request::segment(2) == 'allTimesheet' ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('project.all.timesheet')); ?>"><i
                                    class="bx bx-right-arrow-alt"></i><?php echo e(__('Timesheets')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(\Auth::user()->type == 'company'): ?>
            <li class="mm-active-class">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='ti ti-circle-square'></i></div>
                    <div class="menu-title"><?php echo e(__('Constant')); ?></div>
                </a>
                <ul>
                    <li class="mm-active-class">
                        <a class="dash-link" href="<?php echo e(route('category.index')); ?>">
                            <i class="bx bx-right-arrow-alt"></i>
                            <?php echo e(__('Category')); ?>

                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <li>
            <a class="" href="#" onclick="confirmLogout()">
                <div class="parent-icon icon-color-6">
                    <i class='bx bx-log-out-circle'></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
        <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>

    </ul>
    <!--end navigation-->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
<?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/partials/admin/menu.blade.php ENDPATH**/ ?>