<!-- Centered form container -->
<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full">

        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Manage Institute Departments</h2>

        <!-- Teacher Data Form -->
        <form action="updateDep" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Flex Layout for Form Fields -->
            <div
                class="flex flex-wrap gap-6 mb-4 text-center justify-around border-2 border-gray-300 px-5 py-8 border-l-0 border-r-0">

                <div class="flex-1 min-w-[18%]">
                    <label for="depName" class="block text-gray-900 font-semibold">Department Name</label>
                    <input type="text" id="depName" name="depName"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Department Title or Name" required>
                </div>

                <div class="flex-1 min-w-[18%]">
                    <label for="depType" class="block text-gray-900 font-semibold">Department Type</label>
                    <input type="text" id="depType" name="depType"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Type eg. Class/Trade/Division" required>
                </div>

                <div class="flex-1 min-w-[18%]">
                    <label for="depCode" class="block text-gray-900 font-semibold">Department Code</label>
                    <input type="number" id="depCode" name="depCode"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Four Digit Code" required>
                </div>

                <div class="flex-1 min-w-[18%]">
                    <label for="depHead" class="block text-gray-900 font-semibold">Department Head</label>
                    <input type="text" id="depHead" name="depHead"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Employee email" required>
                </div>

                <!-- Hidden Fields -->
                <input type="text" id="add_by" name="add_by" class="hidden" value="{{ Auth::user()->id }}"
                    required>
                <input type="text" id="institute_id" name="institute_id" class="hidden"
                    value="{{ $institute->institute_id }}" required>

                <!-- Submit Button -->
                <div class="w-fit mt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Create Department
                    </button>
                </div>
            </div>
        </form>


        <!-- Department Data Table -->
        <div class="mt-8 overflow-scroll">
            <div class="min-w-fit w-[100%]">


                <h3 class="text-xl font-semibold text-center text-blue-600 mb-4">Department List</h3>
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Department Name</th>
                            <th class="px-6 py-3 text-left">Department Type</th>
                            <th class="px-6 py-3 text-left">Department Code</th>
                            <th class="px-6 py-3 text-left">Department Head</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Replace with dynamic data using a loop in Laravel -->
                        @foreach ($departments as $department)
                        <tr class="border-b">
                            <td class="px-6 py-3">{{ $department->depName }}</td>
                            <td class="px-6 py-3">{{ $department->depType }}</td>
                            <td class="px-6 py-3">{{ $department->depCode }}</td>
                            <td class="px-6 py-3">{{ $department->depHead }}</td>
                            <td class="px-6 py-3">
                                <a href="#" class="text-blue-600 hover:text-blue-800">Edit</a> | 
                                <a href="#" class="text-red-600 hover:text-red-800">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
