<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="javascript:;">{{ Auth::user()->name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="javascript:;">{{ limitText(Auth::user()->name, 2) }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
                <a href="{{ route('admin.messages') }}" class="nav-link"><i
                        class="fas fa-envelope"></i><span>Messages</span></a>
            </li>
            {{-- <li class="{{ setActive(['admin.messages.index', 'admin.messages.edit']) }}">
                <a class="nav-link" href="{{ route('admin.messages.index') }}">Messages</a>
            </li> --}}

            <li class="menu-header">All Section</li>


            <li class="dropdown {{ setActive(['admin.training-packages.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-user-graduate"></i>
                    <span>Training Package</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.training-packages.create']) }}">
                        <a class="nav-link" href="{{ route('admin.training-packages.create') }}">Create
                            TrainingPackage</a>
                    </li>
                    <li class="{{ setActive(['admin.training-packages.index', 'admin.training-packages.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.training-packages.index') }}">Training Package
                            List</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ setActive(['admin.orders.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.orders.index']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">All Orders</a>
                    </li>
                    {{-- <li class="{{ setActive(['admin.training-packages.index', 'admin.training-packages.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.training-packages.index') }}">Training Package
                            List</a>
                    </li> --}}
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.teams.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-user-friends"></i>
                    <span>Teams</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.teams.index']) }}">
                        <a class="nav-link" href="{{ route('admin.teams.index') }}">All Teams</a>
                    </li>
                    <li class="{{ setActive(['admin.teams.create']) }}">
                        <a class="nav-link" href="{{ route('admin.teams.create') }}">Create Team</a>
                    </li>
                </ul>
            </li>

            <li
                class="{{ setActive(['admin.admission.index', 'admin.admission.edit', 'admin.admission.create', 'admin.admission.show']) }}">
                <a class="nav-link" href="{{ route('admin.admission.index') }}"><i
                        class="fas fa-university"></i><span>Admission</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.events.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="far fa-calendar-check"></i>
                    <span>Events</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.events.create']) }}">
                        <a class="nav-link" href="{{ route('admin.events.create') }}">Create
                            Event</a>
                    </li>
                    <li class="{{ setActive(['admin.events.index', 'admin.events.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.events.index') }}">Event List</a>
                    </li>
                </ul>
            </li>

            <li class="{{ setActive(['admin.gallery.*']) }}"><a class="nav-link"
                    href="{{ route('admin.gallery.index') }}"><i class="fas fa-images"></i><span>Image
                        Gallery</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.sliders.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="far fa-calendar-check"></i>
                    <span>Sliders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.sliders.create']) }}">
                        <a class="nav-link" href="{{ route('admin.sliders.create') }}">Create
                            Slider</a>
                    </li>
                    <li class="{{ setActive(['admin.sliders.index', 'admin.sliders.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.sliders.index') }}">Slider List</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.reviews.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="far fa-calendar-check"></i>
                    <span>Reviews</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.reviews.create']) }}">
                        <a class="nav-link" href="{{ route('admin.reviews.create') }}">Create
                            Review</a>
                    </li>
                    <li class="{{ setActive(['admin.reviews.index', 'admin.reviews.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.reviews.index') }}">Review List</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.contacts.*']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i>
                    <span>Contact</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class="{{ setActive(['admin.contacts.create']) }}">
                        <a class="nav-link" href="{{ route('admin.contacts.create') }}">Create
                            Contact</a>
                    </li> --}}
                    <li class="{{ setActive(['admin.contacts.index', 'admin.contacts.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.contacts.index') }}">Contact List</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.mission', 'admin.vision', 'admin.about']) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-th-large"></i>
                    <span>About&Mission&Vision</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.about']) }}">
                        <a class="nav-link" href="{{ route('admin.about') }}">About Us</a>
                    </li>
                    <li class="{{ setActive(['admin.mission']) }}">
                        <a class="nav-link" href="{{ route('admin.mission') }}">Mission</a>
                    </li>
                    <li class="{{ setActive(['admin.vision']) }}">
                        <a class="nav-link" href="{{ route('admin.vision') }}">Vision</a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">Settings</li>
            <li class="{{ setActive(['admin.setting.index']) }}"><a class="nav-link"
                    href="{{ route('admin.setting.index') }}"><i class="fas fa-wrench"></i><span>Settings</span></a>
            </li>
            {{-- <li class="dropdown {{ setActive([
            'admin.shipping-methods.*', 
            'admin.countries.*', 
            'admin.states.*',
            ]) }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span>Shipping Setup</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.shipping-methods.*']) }}">
                        <a class="nav-link" href="{{ route('admin.shipping-methods.index') }}">Shipping Methods</a>
                    </li>
                    <li class="{{ setActive(['admin.countries.*']) }}">
                        <a class="nav-link" href="{{ route('admin.countries.index') }}">Countries</a>
                    </li>
                    <li class="{{ setActive(['admin.states.*']) }}">
                        <a class="nav-link" href="{{ route('admin.states.index') }}">States / Zones</a>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
