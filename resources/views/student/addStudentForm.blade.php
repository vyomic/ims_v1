<!-- Centered form container -->
<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">

        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Add Student</h2>

        <!-- Student Data Form -->
        <form action="add" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- First Name and Last Name in a single row -->
            <div class="flex flex-nowrap gap-4 mb-4 justify-between">
                <div>
                    <div class="max-w-sm mx-auto mt-5">
                        <!-- Image Preview Box -->
                        <div class="relative">
                            <div
                                class="border-2 border-gray-300 rounded-lg w-[150px] h-[180px] flex justify-center items-center">
                                <img id="imagePreview" src="" alt="Image Preview"
                                    class="hidden object-cover w-full h-full rounded-lg" />
                                <span id="uploadText" class="text-gray-400">Select an image</span>
                            </div>
                        </div>

                        <!-- File Input -->
                        <div class="mt-4">
                            <input type="file" name="photo" accept="image/*"
                                class="mt-2 block w-full text-sm text-gray-700 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:bg-gray-50 file:text-sm file:font-medium"
                                onchange="previewImage(event)" />
                        </div>
                    </div>

                    <script>
                        function previewImage(event) {
                            const file = event.target.files[0];
                            const imagePreview = document.getElementById('imagePreview');
                            const uploadText = document.getElementById('uploadText');

                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    imagePreview.src = e.target.result;
                                    imagePreview.classList.remove('hidden'); // Show the image
                                    uploadText.classList.add('hidden'); // Hide the placeholder text
                                }
                                reader.readAsDataURL(file);
                            } else {
                                imagePreview.classList.add('hidden');
                                uploadText.classList.remove('hidden');
                            }
                        }
                    </script>
                </div>

                <div class="flex flex-col gap-2 w-[500px]">
                    <div>
                        <label for="first_name" class="block text-gray-900 font-semibold">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter first name" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-gray-900 font-semibold">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter last name" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-900 font-semibold">Address</label>
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter address" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Hidden Inputs for Add By and Institute ID -->
            <input type="text" id="add_by" name="add_by" class="hidden" value="{{ Auth::user()->id }}" required>
            <input type="text" id="institute_id" name="institute_id" class="hidden"
                value="{{ $institute->institute_id }}" required>

            <!-- Father's Name, Mother's Name, and DOB in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="father_name" class="block text-gray-900 font-semibold">Father's Name</label>
                    <input type="text" id="father_name" name="father_name"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter father's name" required>
                </div>
                <div>
                    <label for="mother_name" class="block text-gray-900 font-semibold">Mother's Name</label>
                    <input type="text" id="mother_name" name="mother_name"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter mother's name" required>
                </div>
                <div>
                    <label for="dob" class="block text-gray-900 font-semibold">Date of Birth (DOB)</label>
                    <input type="date" id="dob" name="dob"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
            </div>

            <!-- Phone, Email, and Class in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="phone" class="block text-gray-900 font-semibold">Phone</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter phone number" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-900 font-semibold">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter email address" required>
                </div>
                <div>
                    <label for="class" class="block text-gray-900 font-semibold">Class</label>
                    <input type="text" id="class" name="class"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter class" required>
                </div>
            </div>

            <!-- Admit Date (DOJ), Class Teacher, Presence and Leave in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-4">
                <div>
                    <label for="admit" class="block text-gray-900 font-semibold">Admisson Date</label>
                    <input type="date" id="admit" name="admit"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    <script>
                        // Set the current date as the value of the admit input
                        document.addEventListener('DOMContentLoaded', function() {
                            const admitInput = document.getElementById('admit');
                            const currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
                            admitInput.value = currentDate; // Set current date as the value

                            // Set placeholder text (optional)
                            admitInput.setAttribute('placeholder', currentDate); // Set current date as the placeholder
                        });
                    </script>
                </div>
                <div>
                    <label for="cls_teacher" class="block text-gray-900 font-semibold">Class Teacher</label>
                    <input type="text" id="cls_teacher" name="cls_teacher"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter class teacher" required>
                </div>
                <div>
                    <label for="presence" class="block text-gray-900 font-semibold">Presence</label>
                    <input type="text" id="presence" name="presence"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter presence details" required>
                </div>
                <div>
                    <label for="leave" class="block text-gray-900 font-semibold">Leave</label>
                    <input type="text" id="leave" name="leave"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter leave details" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Add Student
                </button>
            </div>
        </form>
    </div>
</div>
