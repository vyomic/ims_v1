<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table</title>
</head>

<body class="bg-gray-100 p-10">

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Father's Name</th>
                    <th class="py-3 px-6 text-left">Mobile</th>
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            @foreach ($teacher as $teacher)
                <tr class="border-b">
                    <td class="py-3 px-6 text-gray-700">{{ $teacher->id }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $teacher->father_name }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $teacher->phone }}</td>
                    <td class="py-3 px-6 text-center">
                        <img src="{{ asset('/storage/' . $teacher->photo) }}" alt="{{ $teacher->photo }}"
                            class="rounded-full w-12 h-12">
                    </td>
                    <td class="py-3 px-6 text-center">
                        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                        {{-- <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 ml-2">Details</a> --}}
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 ml-2"
                            data-teacher="{{ json_encode($teacher) }}" 
                            onclick="openDetailsModal(event)">Details</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

   <!-- Modal for showing details -->
<div id="teacherDetailsModal" class="fixed inset-0 flex justify-center items-center hidden" style="background-color: rgba(87, 87, 87, 0.267); backdrop-filter: blur(4px);">
    <div class="bg-white p-6 rounded-lg w-3/4 md:w-1/2 relative">
        <div class="bg-zinc-600 absolute top-0 left-0 w-full p-1.5 flex justify-between items-center rounded-t-lg">
            <div class="text-lg font-bold text-white" id="teacherNameAndID"></div>
            <button onclick="closeDetailsModal()" class="text-[#52525b] text-[22px] font-bold p-0 text-center m-0 align-middle w-[30px] h-[30px] bg-white rounded-lg">↩</button>
        </div>

        <h2 class="text-2xl font-bold my-4">Teacher Details</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-gray-700">
                <p><strong>Full Name:</strong> <span id="fullName"></span></p>
                <p><strong>Father's Name:</strong> <span id="fatherName"></span></p>
                <p><strong>Phone:</strong> <span id="phone"></span></p>
            </div>
            <div class="text-center">
                <img id="teacherPhoto" src="" alt="Teacher's Photo" class="rounded-lg" style="width: 180px; height: 200px;">
            </div>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-gray-700">
                <p><strong>Address:</strong> <span id="address"></span></p>
                <p><strong>Date of Birth (DOB):</strong> <span id="dob"></span></p>
                <p><strong>Age:</strong> <span id="age"></span></p>
            </div>
            <div class="text-gray-700">
                <p><strong>Experience:</strong> <span id="experience"></span></p>
                <p><strong>Previous Employer:</strong> <span id="previousEmployer"></span></p>
                <p><strong>Assigned Subject:</strong> <span id="assignedSubject"></span></p>
            </div>
        </div>

        <div class="mt-6 text-center">
            <div>
                <form action="edit" method="get">
                    @csrf
                    <input class="none" id="teacherId" type="text" name="id" value="">
                    <button onclick="editRecord()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">Edit</button>
                </form>
            </div>
            <button onclick="deleteRecord()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 mr-2">Delete</button>
            <button onclick="printDetails()" class="bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-700">Print</button>
        </div>
    </div>
</div>

<script>
    function openDetailsModal(event) {
        const button = event.target;
        const teacher = JSON.parse(button.getAttribute('data-teacher'));

        document.getElementById('teacherNameAndID').innerText = `${teacher.first_name} ${teacher.last_name} (ID: ${teacher.id})`;

        document.getElementById('teacherId').value = `${teacher.id}`;
        document.getElementById('fullName').innerText = `${teacher.first_name} ${teacher.last_name}`;
        document.getElementById('fatherName').innerText = teacher.father_name;
        document.getElementById('phone').innerText = teacher.phone;
        document.getElementById('teacherPhoto').src = `{{ asset('storage') }}/${teacher.photo}`;
        document.getElementById('address').innerText = teacher.address;
        document.getElementById('dob').innerText = formatDate(teacher.dob);
        document.getElementById('age').innerText = calculateAge(teacher.dob);
        document.getElementById('experience').innerText = teacher.experience;
        document.getElementById('previousEmployer').innerText = teacher.last_employe;
        document.getElementById('assignedSubject').innerText = teacher.subject;

        document.getElementById('teacherDetailsModal').classList.remove('hidden');
    }

    function closeDetailsModal() {
        document.getElementById('teacherDetailsModal').classList.add('hidden');
    }

    function editRecord() {
        alert('Edit record clicked');
    }

    function deleteRecord() {
        alert('Delete record clicked');
    }

    function printDetails() {
        window.print();
    }
    function formatDate(dob) {
    const date = new Date(dob);
    const day = String(date.getDate()).padStart(2, '0'); // Pad day to ensure two digits
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Pad month to ensure two digits
    const year = date.getFullYear(); // Get full year

    return `${day}/${month}/${year}`; // Return formatted date
}
    function calculateAge(dob) {
        const birthDate = new Date(dob);
        const currentDate = new Date();
        let age = currentDate.getFullYear() - birthDate.getFullYear();
        const monthDifference = currentDate.getMonth() - birthDate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && currentDate.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }
</script>


</body>

</html>
