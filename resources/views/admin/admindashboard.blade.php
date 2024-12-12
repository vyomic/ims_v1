<div class="flex relative">
    <!-- Sidebar -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <!-- Sidebar Wrapper (Initially Hidden) -->
<div id="sidebarWrapper" class="inset-0 bg-gray-800 bg-opacity-0 z-10 translate-x-[-260px] w-fit absolute transition-all duration-900 ease-in flex flex-row-reverse">
    <span class="w-[35px] h-[35vh] relative top-[35%] box-border">
        <button id="sidebarToggleButton" onclick="toggleSidebar()"
            class="bg-blue-700 text-lg text-white w-[150px] h-[35px] pb-2 relative left-[-60px] font-bold transform rotate-90 top-[50%] rounded-[10px] transition-all duration-700 ease-in-out">More
            Options</button> </span>
    <!-- Sidebar Menu -->
    <div id="sidebar" class="w-64 bg-gray-900 text-white p-6 rounded-lg h-screen flex flex-col justify-between transform transition-transform duration-700 ease-in-out">
        <!-- Institute Name -->
        <h1 class="text-[22px] font-semibold text-center mb-10">{{ $institute->inst_name }}</h1>

        <!-- Sidebar Menu -->
        <ul class="space-y-6">
            <!-- Staff Section -->
            <li>
                <button class="w-full text-left text-lg font-semibold hover:bg-blue-600 rounded-lg p-2"
                    onclick="toggleDropdown('staffMenu')">
                    Staff
                </button>
                <div id="staffMenu" class="space-y-3 pl-4 hidden">
                    <a href="{{ route('admin.staff.add') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Add Staff</a>
                    <a href="{{ route('admin.staff.view') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">View Staff</a>
                    <a href="{{ route('admin.staff.report') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>

            <!-- Teacher Section -->
            <li>
                <button class="w-full text-left text-lg font-semibold hover:bg-blue-600 rounded-lg p-2"
                    onclick="toggleDropdown('teacherMenu')">
                    Teacher
                </button>
                <div id="teacherMenu" class="space-y-3 pl-4 hidden">
                    <a href="{{ route('admin.teacher.add') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Add Teacher</a>
                    <a href="{{ route('admin.teacher.view') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">View Teacher</a>
                    <a href="{{ route('admin.teacher.report') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>

            <!-- Student Section -->
            <li>
                <button class="w-full text-left text-lg font-semibold hover:bg-blue-600 rounded-lg p-2"
                    onclick="toggleDropdown('studentMenu')">
                    Student
                </button>
                <div id="studentMenu" class="space-y-3 pl-4 hidden">
                    <a href="{{ route('admin.student.add') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Admit New</a>
                    <a href="{{ route('admin.student.view') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">View Students</a>
                    <a href="{{ route('admin.student.report') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>
        </ul>

        <!-- Logout and Theme Change Button -->
        <div class="mt-auto space-y-3 flex flex-col align-middle">
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-600 text-white text-center rounded-lg p-3 hover:bg-red-700">LogOut</button>
            </form>
            <button id="themeToggle" class="w-full bg-gray-800 text-white text-center rounded-lg p-3 hover:bg-gray-700">Change Theme</button>
        </div>
    </div>
    {{-- <!-- Button to Toggle Sidebar -->
<button id="sidebarToggleButton" onclick="toggleSidebar()" class="bg-blue-700 text-lg text-white absolute right-[-345px] w-[150px] h-[35px] pb-2 font-bold transform rotate-90 top-[50%] rounded-[10px] transition-all duration-700 ease-in-out">More Options</button> --}}

</div>


<script>
    // Function to toggle the sidebar visibility (slide in/out)
function toggleSidebar() {
    const sidebarWrapper = document.getElementById('sidebarWrapper');
    const sidebar = document.getElementById('sidebar');
    
    // If the sidebar is hidden, show it
    if (sidebarWrapper.classList.contains('translate-x-[-260px]')) {
        sidebarWrapper.classList.remove('translate-x-[-260px]');
        sidebarWrapper.classList.remove('absoulute');
        sidebarWrapper.classList.add('relative');
        sidebarWrapper.classList.add('translate-x-0');
        // setTimeout(() => {
        //     sidebar.classList.remove('-translate-x-full');  // Slide in
        //     sidebar.classList.add('translate-x-0');         // Sidebar is in view
        // }, 10); // Small delay to trigger the transition
    } else {
        // sidebar.classList.remove('translate-x-0');       // Slide out
        // sidebar.classList.add('-translate-x-full');       // Move off-screen
        // setTimeout(() => {
            sidebarWrapper.classList.add('translate-x-[-260px]');
            sidebarWrapper.classList.remove('translate-x-0');
            sidebarWrapper.classList.add('absoulute');
        sidebarWrapper.classList.remove('relative');
            
            // Hide the sidebar wrapper after transition        // Hide the sidebar wrapper after transition
        // }, 300); // Wait for the transition to complete before hiding
    }
}

// Function to toggle dropdown visibility
function toggleDropdown(menuId) {
    const menu = document.getElementById(menuId);
    menu.classList.toggle('hidden');
}

// Close sidebar if clicking outside
window.addEventListener('click', function(event) {
    const sidebarWrapper = document.getElementById('sidebarWrapper');
    if (!sidebarWrapper.contains(event.target) && !event.target.closest('#sidebarToggleButton')) {
        // const sidebar = document.getElementById('sidebar');
        // sidebar.classList.remove('translate-x-0');
        // sidebar.classList.add('-translate-x-full');
            sidebarWrapper.classList.add('translate-x-[-260px]');
             // Wait for the transition to complete before hiding
    }
});
</script>

    <!-- Main Content -->
    <div class="flex-1 p-6 max-h-screen overflow-scroll transition-all ease-in-out duration-[2000]">
        <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Admin- {{ $institute->inst_name }}, {{$institute->address}}</h2>
        @if($reqType=='addTeacherForm')  
                @include('teacher.addTeacherForm')
        @elseif($reqType=='addStudentForm')  
                @include('student.addStudentForm')
        @elseif($reqType=='readTeacher')  
                @include('teacher.readTeacher')
        @elseif($reqType=='readStudent')  
                @include('student.readStudent')
        @elseif($reqType=='editTeacher')  
                @include('teacher.editTeacher')
        @elseif($reqType=='manage')  
                @include('tools.addinstitute.instituteDep')
        @else
        <p class="text-gray-700">Here you can manage the institute data, staff, teachers, and students.</p>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-500 p-4 border-2 border-solid rounded-xl h-[150px]">
                <span class="font-bold block text-[35px]">{{$teacherCount}}</span>
                <span class="font-semibold">No of Teachers</span>
            </div>
            <div class="bg-teal-800 p-4 border-2 border-solid rounded-xl h-[150px]">
                <span class="font-bold block text-white text-[35px]">{{$stuCount}}</span>
                <span class="font-semibold">No of Student</span>
            </div>
            <div class="bg-green-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 3</div>
            <div class="bg-yellow-500 p-4 border-2 border-solid rounded-xl h-[150px]">Event/ News
                <a href=""></a>
            </div>
            <div class="bg-purple-800 p-4 border-2 border-solid rounded-xl h-[150px]">Time Table
                <span class="text-white font-bold">{{$reqType}}</span>
            </div>
            <div class="bg-indigo-500 p-4 border-2 border-solid rounded-xl h-[150px]">Manage Institute
                <a href="{{ route('admin.manage') }}" class="text-white font-bold bg-blue-500 no-underline border-2 border-blue-600 rounded-lg p-4"> Click Here</a>
            </div>
          </div>
        <!-- File Upload Section -->
        <div>
            <div class="text-center">
                <h2 class="text-2xl font-semibold mb-4">Upload Your File</h2>

                <!-- Hidden File Input + Custom Button -->
                <label for="file-upload"
                    class="bg-blue-500 text-white px-6 py-2 rounded-full cursor-pointer hover:bg-blue-600 transition duration-300">
                    Choose File
                </label>
                <input id="file-upload" type="file" class="hidden" />

                <div class="mt-4">
                    <p id="file-name" class="text-gray-600"></p>
                </div>
            </div>

            <!-- JavaScript to display the selected file name -->
        </div>
    </div>
</div>


<script>
    // Toggle dropdown visibility
    // function toggleDropdown(menuId) {
    //     const menu = document.getElementById(menuId);
    //     menu.classList.toggle('hidden');
    // }

    // Theme toggle functionality
    document.getElementById('themeToggle').addEventListener('click', function() {
        document.body.classList.toggle('dark');
    });

    // Save theme preference in localStorage
    document.getElementById('themeToggle').addEventListener('click', function() {
        document.body.classList.toggle('dark');
        localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
    });

    // Load theme preference on page load
    window.addEventListener('DOMContentLoaded', (event) => {
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
        }
    });
</script>
@endif