<nav class="relative z-10 flex flex-wrap items-center justify-between px-6 py-4 bg-white shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64">
    <div class="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
        <button class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-700 whitespace-nowrap" href="{{ route('admin.home') }}">
            Captains Admin Dashboard
        </a>
        <div class="absolute top-0 left-0 right-0 z-40 items-center flex-1 hidden h-auto overflow-x-hidden overflow-y-auto rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none" id="example-collapse-sidebar">
            <div class="block pb-4 mb-4 border-b border-solid md:min-w-full md:hidden border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase md:block md:pb-2 text-blueGray-700 whitespace-nowrap" href="{{ route('admin.home') }}">
                            Captains Admin Dashboard
                        </a>
                    </div>
                    <div class="flex justify-end w-6/12">
                        <button type="button" class="px-3 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="pt-0 mb-3">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('notification_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/notifications*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.notifications.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.notification.title') }}
                        </a>
                    </li>
                @endcan
                @can('system_calendar_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-calendars.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                            </i>
                            {{ trans('cruds.systemCalendar.title') }}
                        </a>
                    </li>
                @endcan
                @can('inventory_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/products*")||request()->is("admin/requisitions*")||request()->is("admin/categories*")||request()->is("admin/types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-box">
                            </i>
                            {{ trans('cruds.inventoryManagement.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('product_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/products*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.products.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cart-plus">
                                        </i>
                                        {{ trans('cruds.product.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('requisition_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/requisitions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.requisitions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-passport">
                                        </i>
                                        {{ trans('cruds.requisition.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-at">
                                        </i>
                                        {{ trans('cruds.category.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-crop-alt">
                                        </i>
                                        {{ trans('cruds.type.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('premises_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/sections*")||request()->is("admin/tables*")||request()->is("admin/bookings*")||request()->is("admin/section-sales*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-chart-area">
                            </i>
                            {{ trans('cruds.premisesManagement.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('section_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sections*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sections.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map">
                                        </i>
                                        {{ trans('cruds.section.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('table_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tables*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tables.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-table">
                                        </i>
                                        {{ trans('cruds.table.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('booking_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/bookings*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.bookings.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-book-open">
                                        </i>
                                        {{ trans('cruds.booking.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('section_sale_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/section-sales*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.section-sales.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-dollar-sign">
                                        </i>
                                        {{ trans('cruds.sectionSale.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('point_of_sale_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/carts*")||request()->is("admin/transactions*")||request()->is("admin/order-details*")||request()->is("admin/orders*")||request()->is("admin/discounts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-clipboard-check">
                            </i>
                            {{ trans('cruds.pointOfSale.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('cart_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/carts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.carts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cart-plus">
                                        </i>
                                        {{ trans('cruds.cart.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/transactions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.transactions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-dollar-sign">
                                        </i>
                                        {{ trans('cruds.transaction.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('order_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/order-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.order-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.orderDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('order_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/orders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.orders.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cart-arrow-down">
                                        </i>
                                        {{ trans('cruds.order.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('discount_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/discounts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.discounts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-hand-holding-usd">
                                        </i>
                                        {{ trans('cruds.discount.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('sms_order_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/sms*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-mobile-alt">
                            </i>
                            {{ trans('cruds.smsOrder.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('sms_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sms*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sms.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-envelope-open">
                                        </i>
                                        {{ trans('cruds.sms.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/contact-companies*")||request()->is("admin/contact-contacts*")||request()->is("admin/customers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-phone-square">
                            </i>
                            {{ trans('cruds.contactManagement.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('contact_company_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-companies*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-companies.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-building">
                                        </i>
                                        {{ trans('cruds.contactCompany.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('contact_contact_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-contacts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.contactContact.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('customer_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/customers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.customers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.customer.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/staff*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="hidden ml-4 subnav">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('staff_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/staff*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.staff.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-address-card">
                                        </i>
                                        {{ trans('cruds.staff.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="float-right px-2 py-1 text-xs font-bold text-white bg-rose-500 rounded-xl">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
