<div class="flex">
    <!-- Sidebar -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="w-64 bg-gray-900 text-white p-6 rounded-lg h-screen flex flex-col justify-between align-middle">
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
                    <a href="{{ route('admin.staff.add') }}" class="block text-white hover:bg-blue-700 rounded-lg p-2">Add
                        Staff</a>
                    <a href="{{ route('admin.staff.view') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">View Staff</a>
                    <a href="{{ route('admin.staff.report') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>

            <!-- Teacher Section -->
            <li>
                <button class="w-full text-left text-lg font-semibold hover:bg-blue-600 rounded-lg p-2"
                    onclick="toggleDropdown('teacherMenu')">
                    Teacher
                </button>
                <div id="teacherMenu" class="space-y-3 pl-4 hidden">
                    <a href="{{ route('admin.teacher.add') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">Add Teacher</a>
                    <a href="{{ route('admin.teacher.view') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">View Teacher</a>
                    <a href="{{ route('admin.teacher.report') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>

            <!-- Student Section -->
            <li>
                <button class="w-full text-left text-lg font-semibold hover:bg-blue-600 rounded-lg p-2"
                    onclick="toggleDropdown('studentMenu')">
                    Student
                </button>
                <div id="studentMenu" class="space-y-3 pl-4 hidden">
                    <a href="{{ route('admin.student.admit') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">Admit New</a>
                    <a href="{{ route('admin.student.view') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">View Students</a>
                    <a href="{{ route('admin.student.report') }}"
                        class="block text-white hover:bg-blue-700 rounded-lg p-2">Generate Report</a>
                </div>
            </li>
        </ul>
        <script>
            function toggleDropdown(menuId) {
        const menu = document.getElementById(menuId);
        menu.classList.toggle('hidden');
    }
        </script>
        <!-- Logout and Theme Change Button -->
        <div class="mt-auto space-y-3 flex flex-col align-middle">
            <form id='logout' method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="w-full bg-red-600 text-white text-center rounded-lg p-3 hover:bg-red-700">LogOut</button>
                    {{-- onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }} --}}
                    {{-- <input type="Submit"> --}}
            </form>
            <a href="#logout"
                class="w-full bg-red-600 text-white text-center rounded-lg p-3 hover:bg-red-700">Logout</a>
            <button id="themeToggle"
                class="w-full bg-gray-800 text-white text-center rounded-lg p-3 hover:bg-gray-700">Change Theme</button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 max-h-screen overflow-scroll">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Admin- {{ $institute->inst_name }}, {{$institute->address}}</h2>
        @if($reqType=='addTeacherForm')  
                @include('teacher.addTeacherForm')
        @elseif($reqType=='readTeacher')  
                @include('teacher.readTeacher')
        @elseif($reqType=='editTeacher')  
                @include('teacher.editTeacher')
        @else
        <p class="text-gray-700">Here you can manage the institute data, staff, teachers, and students.</p>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 1</div>
            <div class="bg-red-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 2</div>
            <div class="bg-green-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 3</div>
            <div class="bg-yellow-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 4</div>
            <div class="bg-purple-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 5</div>
            <div class="bg-indigo-500 p-4 border-2 border-solid rounded-xl h-[150px]">Item 6</div>
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