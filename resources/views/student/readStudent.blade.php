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
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Father's Name</th>
                    <th class="py-3 px-6 text-left">Mobile</th>
                    <th class="py-3 px-6 text-left">Class Teacher</th>
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            @foreach ($students as $student)
                <tr class="border-b hover:bg-slate-100">
                    <td class="py-3 px-6 text-gray-700">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $student->father_name }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $student->phone }}</td>
                    <td class="py-3 px-6 text-gray-700">{{ $student->cls_teacher }}</td>
                    <td class="py-3 px-6 text-center">
                        <img src="{{ asset('/storage/' . $student->photo) }}" alt="{{ $student->photo }}"
                            class="rounded-full w-12 h-12">
                    </td>
                    <td class="py-3 px-6 text-center flex gap-1 justify-center flex-row flex-wrap content-center">
                        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                        {{-- <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 ml-2">Details</a> --}}
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700"
                            data-student="{{ json_encode($student) }}" 
                            onclick="openDetailsModal(event)">Details</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        {{ $students->links() }}
    </div>

   <!-- Modal for showing details -->
<div id="studentDetailsModal" class="fixed inset-0 flex justify-center items-center hidden" style="background-color: rgba(87, 87, 87, 0.267); backdrop-filter: blur(4px);">
    <div class="bg-white p-6 rounded-lg w-3/4 md:w-1/2 relative">
        <div class="bg-zinc-600 absolute top-0 left-0 w-full p-1.5 flex justify-between items-center rounded-t-lg">
            <div class="text-lg font-bold text-white" id="studentNameAndID"></div>
            <button onclick="closeDetailsModal()" class="text-[#52525b] text-[22px] font-bold p-0 text-center m-0 align-middle w-[30px] h-[30px] bg-white rounded-lg">↩</button>
        </div>

        <h2 class="text-2xl font-bold my-4">Student Details</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-gray-700">
                <p><strong>Full Name:</strong> <span id="fullName"></span></p>
                <p><strong>Father's Name:</strong> <span id="fatherName"></span></p>
                <p><strong>Mother's Name:</strong> <span id="motherName"></span></p>
                <p><strong>Phone:</strong> <span id="phone"></span></p>
            </div>
            <div class="text-center">
                <img id="studentPhoto" src="" alt="Student's Photo" class="rounded-lg" style="width: 180px; height: 200px;">
            </div>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-gray-700">
                <p><strong>Address:</strong> <span id="address"></span></p>
                <p><strong>Date of Birth (DOB):</strong> <span id="dob"></span></p>
                <p><strong>Age:</strong> <span id="age"></span></p>
            </div>
            <div class="text-gray-700">
                <p><strong>Class Teacher:</strong> <span id="cls_teacher"></span></p>
                <p><strong>Attendence:</strong> <span id="presence"></span></p>
                <p><strong>Leave:</strong> <span id="leave"></span></p>
            </div>
        </div>

        <div class="mt-6 text-center">
            <div>
                <form action="edit" method="get">
                    @csrf
                    <input class="none" id="studentId" type="text" name="id" value="">
                    <button  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">Edit</button>
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
        const student = JSON.parse(button.getAttribute('data-student'));

        document.getElementById('studentNameAndID').innerText = `${student.first_name} ${student.last_name} (ID: ${student.id})`;
        console.log(student.father_name);
        document.getElementById('studentId').value = `${student.id}`;
        document.getElementById('fullName').innerText = `${student.first_name} ${student.last_name}`;
        document.getElementById('fatherName').innerText = student.father_name;
        document.getElementById('motherName').innerText = student.mother_name;
        document.getElementById('phone').innerText = student.phone;
        document.getElementById('studentPhoto').src = `{{ asset('storage') }}/${student.photo}`;
        document.getElementById('address').innerText = student.address;
        document.getElementById('dob').innerText = formatDate(student.dob);
        document.getElementById('age').innerText = calculateAge(student.dob);
        document.getElementById('cls_teacher').innerText = student.cls_teacher;
        document.getElementById('presence').innerText = student.presence;
        document.getElementById('leave').innerText = student.leave;

        document.getElementById('studentDetailsModal').classList.remove('hidden');
    }

    function closeDetailsModal() {
        document.getElementById('studentDetailsModal').classList.add('hidden');
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
