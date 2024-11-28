<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Show the create institute form -->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <!-- Section 1: Institute Details -->
        <h2 class="font-bold text-xl text-gray-700">Institute Details</h2>
        <form id="institute-form" method="POST" action="reg">
            @csrf
            <!-- Name of Institute -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="institute_name">
                        Name of Institute
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="text" id="institute_name" name="institute_name" class="form-input"
                        placeholder="Enter Institute Name" required>
                </div>
            </div>

            <!-- Address -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="address">
                        Address
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="text" id="address" name="address" class="form-input" placeholder="Enter Address"
                        required>
                </div>
            </div>

            <!-- Email -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="email" id="email" name="email" class="form-input" placeholder="Enter Email"
                        required>
                </div>
            </div>

            <!-- Phone -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="phone">
                        Phone
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="text" id="phone" name="phone" class="form-input"
                        placeholder="Enter Phone Number" required>
                </div>
            </div>

            <!-- Website -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="website">
                        Website
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="text" id="website" name="website" class="form-input"
                        placeholder="Enter Website URL" required>
                </div>
            </div>

            <!-- Type (Selection Dropdown) -->
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="institute_type">
                        Institute Type
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select id="institute_type" name="institute_type" class="form-select"
                        onchange="showCourseAndDetails()" required>
                        <option value="">Select Institute Type</option>
                        <option value="Pvt Coaching Institute">Pvt Coaching Institute</option>
                        <option value="Pvt College (Post HSC)">Pvt College (Post HSC)</option>
                        <option value="Pvt School">Pvt School</option>
                        <option value="Govt. School">Govt. School</option>
                        <option value="Govt College (Post HSC)">Govt College (Post HSC)</option>
                        <option value="Skill Training Institute">Skill Training Institute</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Section 2: Course and Other Details -->
            <div id="course-details" style="display: none;">
                <h2 class="font-bold text-xl text-gray-700 mt-8">Course and Other Details</h2>

                <!-- Course Domain (Checkboxes) -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="course_domain">
                            Course Domain
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="course_domain[]" value="Arts">
                            <span class="ml-2">Arts</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="checkbox" class="form-checkbox" name="course_domain[]" value="Commerce">
                            <span class="ml-2">Commerce</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="checkbox" class="form-checkbox" name="course_domain[]" value="Engineering">
                            <span class="ml-2">Engineering</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="checkbox" class="form-checkbox" name="course_domain[]" value="Medical">
                            <span class="ml-2">Medical</span>
                        </label>
                    </div>
                </div>

                <!-- Specialization -->
                <div id="specialization-section" style="display: none;">
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                for="specialization">
                                Specialization
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Physics">
                                <span class="ml-2">Physics</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Chemistry">
                                <span class="ml-2">Chemistry</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Biology">
                                <span class="ml-2">Biology</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Competition">
                                <span class="ml-2">Competition</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Languages">
                                <span class="ml-2">Languages</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]"
                                    value="Commerce">
                                <span class="ml-2">Commerce</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="specialization[]" value="UPSC">
                                <span class="ml-2">UPSC</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Board (Checkboxes) -->
                <div id="board-section" style="display: none;">
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                for="board">
                                Board
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="board[]" value="State Board">
                                <span class="ml-2">State Board</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="board[]" value="CBSE">
                                <span class="ml-2">CBSE</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="board[]" value="ICSE">
                                <span class="ml-2">ICSE</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="board[]" value="Other">
                                <span class="ml-2">Other</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Skill Set -->
                <div id="skill-set-section" style="display: none;">
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                for="skill_set">
                                Skill Set
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]"
                                    value="Computer Programming">
                                <span class="ml-2">Computer Programming</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]" value="Excel">
                                <span class="ml-2">Excel</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]" value="CNC">
                                <span class="ml-2">CNC</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]" value="MIS">
                                <span class="ml-2">MIS</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]" value="ERP">
                                <span class="ml-2">ERP</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="checkbox" class="form-checkbox" name="skill_set[]" value="Other">
                                <span class="ml-2">Other</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Affiliation -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="affiliation">
                            Affiliation
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="text" id="affiliation" name="affiliation" class="form-input"
                            placeholder="Enter Affiliation" required>
                    </div>
                </div>
            </div>

            <!-- Section 3: Owner Details -->
            <div class="mt-8">
                <h2 class="font-bold text-xl text-gray-700">Owner Details</h2>

                <!-- Owner Name -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="owner_name">
                            Owner Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="text" id="owner_name" name="owner_name" class="form-input"
                            placeholder="Enter Owner Name" required>
                    </div>
                </div>

                <!-- Owner Phone -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="owner_phone">
                            Owner Phone
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="text" id="owner_phone" name="owner_phone" class="form-input"
                            placeholder="Enter Owner Phone" required>
                    </div>
                </div>

                <!-- Owner Email -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="owner_email">
                            Owner Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="email" id="owner_email" name="owner_email" class="form-input"
                            placeholder="{{ $user_email }}" disabled>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button type="submit"
                            class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <h1>{{ $isNew }}</h1>
    <h1>{{ $user_name }}</h1>
    <h1>{{ $user_email }}</h1>
    <h1>{{ $user_id }}</h1>
    <script>
        // Toggle visibility of sections based on the selected institute type
        function showCourseAndDetails() {
            var instituteType = document.getElementById('institute_type').value;

            // Reset all sections
            document.getElementById('course-details').style.display = 'none';
            document.getElementById('specialization-section').style.display = 'none';
            document.getElementById('board-section').style.display = 'none';
            document.getElementById('skill-set-section').style.display = 'none';

            // Show relevant sections based on the selected type
            if (instituteType.includes("Pvt") || instituteType.includes("Govt Post HSC")) {
                document.getElementById('course-details').style.display = 'block';
            }
            if (instituteType === "Pvt Coaching Institute") {
                document.getElementById('specialization-section').style.display = 'block';
            }
            if (instituteType === "Pvt School" || instituteType === "Govt School") {
                document.getElementById('board-section').style.display = 'block';
            }
            if (instituteType === "Skill Training Institute") {
                document.getElementById('skill-set-section').style.display = 'block';
            }
        }
    </script>


</x-app-layout>
