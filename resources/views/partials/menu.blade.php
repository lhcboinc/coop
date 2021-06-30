<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/working-hours*") ? "c-show" : "" }} {{ request()->is("admin/user-images*") ? "c-show" : "" }} {{ request()->is("admin/account-operations*") ? "c-show" : "" }} {{ request()->is("admin/favourite-users*") ? "c-show" : "" }} {{ request()->is("admin/verifications*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('working_hour_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.working-hours.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/working-hours") || request()->is("admin/working-hours/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workingHour.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_image_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-images.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-images") || request()->is("admin/user-images/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userImage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('account_operation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.account-operations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/account-operations") || request()->is("admin/account-operations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.accountOperation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('favourite_user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.favourite-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/favourite-users") || request()->is("admin/favourite-users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.favouriteUser.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('verification_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.verifications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/verifications") || request()->is("admin/verifications/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-id-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.verification.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('work_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/works*") ? "c-show" : "" }} {{ request()->is("admin/work-images*") ? "c-show" : "" }} {{ request()->is("admin/offers*") ? "c-show" : "" }} {{ request()->is("admin/messages*") ? "c-show" : "" }} {{ request()->is("admin/feedback*") ? "c-show" : "" }} {{ request()->is("admin/favourite-works*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-columns c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.workManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list-ul c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('work_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.works.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/works") || request()->is("admin/works/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dolly c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.work.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('work_image_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.work-images.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/work-images") || request()->is("admin/work-images/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-images c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workImage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('offer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.offers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-handshake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.offer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('message_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.messages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/messages") || request()->is("admin/messages/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.message.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('feedback_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.feedback.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/feedback") || request()->is("admin/feedback/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.feedback.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('favourite_work_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.favourite-works.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/favourite-works") || request()->is("admin/favourite-works/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.favouriteWork.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('help_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/answers*") ? "c-show" : "" }} {{ request()->is("admin/tutorials*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-question-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.help.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-info c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.answer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tutorial_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tutorials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tutorials") || request()->is("admin/tutorials/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-youtube c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tutorial.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('page_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.page.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>