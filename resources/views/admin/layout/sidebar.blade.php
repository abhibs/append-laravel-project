<div class="vertical-menu">

    <div data-simplebar class="h-100">
        @php
            $admin = Auth::guard('admin')->user();
            $aboutdata = App\Models\About::first();
            $featuredata = App\Models\Feature::first();
            
        @endphp
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ !empty($admin->image) ? url('storage/admin/' . $admin->image) : url('no_image.jpg') }}"
                    alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $admin->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    {{ $admin->email }}</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('admin-dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>User Profile</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('user-profile') }}">Update User Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>User Enquiry List</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('user-enquiry') }}">All User Enquiries</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Client</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('client-create') }}">Add Client</a></li>
                        <li><a href="{{ route('client') }}">All Clients</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>About Us</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        @if (isset($aboutdata))
                            <li><a href="{{ route('about') }}">Update About Us Content</a></li>
                        @else
                            <li><a href="{{ route('about-create') }}">Add About Us Content</a></li>
                        @endif
                        <li><a href="{{ route('aboutus-create') }}">Add About Us Feature</a></li>
                        <li><a href="{{ route('aboutus') }}">All About Us Features</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>Service</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('service-create') }}">Add Service</a></li>
                        <li><a href="{{ route('service') }}">All Services</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Featured Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        @if (isset($featuredata))
                            <li><a href="{{ route('feature') }}">Update Featured Content</a></li>
                        @else
                            <li><a href="{{ route('feature-create') }}">Add Featured Content</a></li>
                        @endif

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Portfolio Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('category-create') }}">Add Portfolio Category</a></li>
                        <li><a href="{{ route('category') }}">All Portfolio Categories</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('portfolio-create') }}">Add Portfolio</a></li>
                        <li><a href="{{ route('portfolio') }}">All Portfolio</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-red-packet-fill"></i>
                        <span>Packages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('package-create') }}">Add Package</a></li>
                        <li><a href="{{ route('package') }}">All Packages</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span>Faq</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('faq-create') }}">Add Faq</a></li>
                        <li><a href="{{ route('faq') }}">All Faq</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Team Member</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('team-create') }}">Add Team Member</a></li>
                        <li><a href="{{ route('team') }}">All Team Members</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Testimonial</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('testimonial-create') }}">Add Testimonial</a></li>
                        <li><a href="{{ route('testimonial') }}">All Testimonial</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Projects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('project-create') }}">Add Project</a></li>
                        <li><a href="{{ route('project') }}">All Project</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-contacts-book-2-fill"></i>
                        <span>User Contact List</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('user-contact') }}">All Contact List</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-red-packet-fill"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        {{-- <li><a href="{{ route('package-create') }}">Add Package</a></li> --}}
                        <li><a href="{{ route('order') }}">All Orders</a></li>

                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
