<!-- Centered form container -->
<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
        
        <h2 class="text-2xl font-semibold text-center text-blue-600 mb-6">Update information for ID: {{$teacher[0]->id}}</h2>

        <!-- Teacher Data Form -->
        <form action="edit" method="POST" enctype="multipart/form-data">
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
                <div class="flex flex-col gap-2  w-[500px]">
                    <div>
                        <label for="first_name" class="block text-gray-900 font-semibold">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter first name" value="{{$teacher[0]->first_name}}" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-gray-900 font-semibold">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter last name" value="{{$teacher[0]->last_name}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-900 font-semibold">Address</label>
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="Enter address" required>{{$teacher[0]->address}}</textarea>
                    </div>
                </div>
            </div>
            <input type="text" id="add_by" name="add_by" class="hidden" value="{{ Auth::user()->id }}" required>
            <input type="text" id="institute_id" name="institute_id" class="hidden"
                value="{{ $institute->institute_id }}" required>
                <input type="text" id="institute_id" name="id" class="hidden"
                value="{{ $teacher[0]->id }}" required>
            <!-- Father's Name and DOB in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="father_name" class="block text-gray-900 font-semibold">Father's Name</label>
                    <input type="text" id="father_name" name="father_name"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter father's name" value="{{$teacher[0]->father_name}}" required>
                </div>
                <div>
                    <label for="dob" class="block text-gray-900 font-semibold">Date of Birth (DOB)</label>
                    <input type="date" id="dob" name="dob"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        value="{{$teacher[0]->dob}}" required>
                </div>
            </div>

            <!-- Phone and Email in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="phone" class="block text-gray-900 font-semibold">Phone</label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter phone number" value="{{$teacher[0]->phone}}" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-900 font-semibold">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter email address" value="{{$teacher[0]->email}}" disabled required>
                </div>
            </div>

            <!-- Address in the next row -->


            <!-- Max Qualification and DOJ in a single row -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                {{-- <div>
                    <label for="max_qualification" class="block text-gray-900 font-semibold">Max Qualification</label>
                    <input type="text" id="max_qualification" name="max_qualification"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter max qualification" required>
                </div> --}}
                {{-- <div>
                    <label for="doj" class="block text-gray-900 font-semibold">Date of Joining (DOJ)</label>
                    <input type="date" id="doj" name="doj"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div> --}}
            </div>

            <!-- Subject in the last row -->
            {{-- <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="Experience" class="block text-gray-900 font-semibold">Experience at Joining</label>
                    <input type="text" id="experience" name="experience"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter Your Experience Level" required>
                </div> --}}
                {{-- <div>
                    <label for="last_employeement" class="block text-gray-900 font-semibold">Last Employer</label>
                    <input type="text" id="last_employer" name="last_employe"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Last Employer Details (Fresher Type: N/A)" required>
                </div> --}}
                <div>
                    <label for="subject" class="block text-gray-900 font-semibold">Preferred Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="w-full px-4 py-2 mt-2 rounded-md border-2 border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter Subject to be Lectured" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit"
                    class="px-6 py-3 bg-teal-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
