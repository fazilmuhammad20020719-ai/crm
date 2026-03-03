<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../public/index.php");
    exit();
}
$admin_username = $_SESSION['admin_username'];
$page_title = "Add Student";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - FMAC Central</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .tab-active {
            color: #1ca350;
            border-bottom: 2px solid #1ca350;
            font-weight: 600;
        }

        .tab-inactive {
            color: #6b7280;
            font-weight: 500;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-label {
            display: block;
            font-size: 0.70rem;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.35rem;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            outline: none;
            transition: all 0.2s;
            font-size: 0.875rem;
        }

        .form-input:focus {
            border-color: #1ca350;
            box-shadow: 0 0 0 1px #1ca350;
        }

        .form-select {
            appearance: none;
            background-color: white;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>
</head>

<body class="flex">

    <!-- Sidebar -->
    <?php include '../views/includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 min-h-screen flex flex-col pt-8 px-8 pb-12">

        <form id="studentForm" action="../backend/save_student.php" method="POST" enctype="multipart/form-data">

            <!-- Header Row -->
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 tracking-tight">New Admission</h1>
                    <div class="text-sm text-gray-400 mt-1 flex items-center gap-2">
                        <span class="hover:text-gray-600 cursor-pointer transition-colors">Students</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-[#1ca350] font-medium">Add Student</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button"
                        class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-50 flex items-center gap-2 transition-shadow shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 bg-[#1ca350] text-white rounded-lg text-sm font-semibold hover:bg-[#15803d] flex items-center gap-2 transition-shadow shadow-sm shadow-green-600/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Save
                    </button>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200 mb-6 flex gap-8 px-1">
                <button type="button" class="pb-3 tab-active text-sm"
                    onclick="switchTab('details', this)">Details</button>
                <button type="button" class="pb-3 tab-inactive text-sm transition-colors hover:text-gray-800"
                    onclick="switchTab('guardian', this)">Guardian</button>
                <button type="button" class="pb-3 tab-inactive text-sm transition-colors hover:text-gray-800"
                    onclick="switchTab('academic', this)">Academic</button>
                <button type="button" class="pb-3 tab-inactive text-sm transition-colors hover:text-gray-800"
                    onclick="switchTab('documents', this)">Documents</button>
            </div>

            <!-- ======= TAB 1: DETAILS ======= -->
            <div id="tab-details" class="tab-content active space-y-6">
                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Personal Information</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <!-- Photo Upload -->
                        <div class="lg:col-span-1">
                            <label class="form-label">STUDENT PHOTO</label>
                            <label
                                class="border-2 border-dashed border-gray-200 rounded-xl h-40 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 hover:border-[#1ca350] transition-colors mt-1 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-gray-300 mb-2 group-hover:text-[#1ca350] transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span
                                    class="text-[11px] font-medium text-gray-400 group-hover:text-[#1ca350] transition-colors">Click
                                    to upload</span>
                                <input type="file" name="student_photo" class="hidden" accept="image/*">
                            </label>
                        </div>

                        <!-- Form Fields -->
                        <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                            <div>
                                <label class="form-label">INDEX NUMBER <span class="text-red-500">*</span></label>
                                <input type="text" name="index_number" class="form-input" placeholder="# ST 2024 001"
                                    required>
                            </div>
                            <div>
                                <label class="form-label">STUDENT STATUS <span class="text-red-500">*</span></label>
                                <select name="status" class="form-input form-select">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>

                            <div>
                                <label class="form-label">FIRST NAME <span class="text-red-500">*</span></label>
                                <input type="text" name="first_name" class="form-input" placeholder="Mohamed" required>
                            </div>
                            <div>
                                <label class="form-label">LAST NAME</label>
                                <input type="text" name="last_name" class="form-input" placeholder="Rifkan">
                            </div>

                            <div>
                                <label class="form-label">DATE OF BIRTH <span class="text-red-500">*</span></label>
                                <input type="date" name="dob" class="form-input text-gray-500" required>
                            </div>
                            <div>
                                <label class="form-label">GENDER</label>
                                <select name="gender" class="form-input form-select">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div>
                                <label class="form-label">NIC NUMBER (OPTIONAL)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nic_number" class="form-input pl-9"
                                        placeholder="987654321V">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">EMAIL ADDRESS</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" name="email" class="form-input pl-9"
                                        placeholder="student@example.com">
                                </div>
                            </div>

                            <div>
                                <label class="form-label">PHONE NUMBER</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="phone_number" class="form-input pl-9"
                                        placeholder="+94 77 123 4567">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">WHATSAPP NUMBER</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="whatsapp_number" class="form-input pl-9"
                                        placeholder="+94 77 123 4567">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address & Location -->
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Address & Location</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-5">
                        <div>
                            <label class="form-label">DISTRICT / REGION</label>
                            <select name="district" class="form-input form-select">
                                <option>Select District</option>
                                <option>Colombo</option>
                                <option>Kandy</option>
                                <option>Galle</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">DS DIVISION</label>
                            <input type="text" name="ds_division" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">GN DIVISION</label>
                            <input type="text" name="gn_division" class="form-input">
                        </div>

                        <div class="md:col-span-2">
                            <label class="form-label">HOME ADDRESS</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <input type="text" name="home_address" class="form-input pl-9" placeholder="">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">GOOGLE MAP LINK</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <input type="url" name="google_map_link" class="form-input pl-9"
                                    placeholder="https://maps.google.com/...">
                            </div>
                        </div>

                        <div>
                            <label class="form-label">LATITUDE</label>
                            <input type="text" name="latitude" class="form-input" placeholder="e.g. 6.9271">
                        </div>
                        <div>
                            <label class="form-label">LONGITUDE</label>
                            <input type="text" name="longitude" class="form-input" placeholder="e.g. 79.8612">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======= TAB 2: GUARDIAN ======= -->
            <div id="tab-guardian" class="tab-content">
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Guardian Information</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <label
                                class="border-2 border-dashed border-gray-200 rounded-xl h-40 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 hover:border-[#1ca350] transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-gray-300 mb-2 group-hover:text-[#1ca350] transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span
                                    class="text-[11px] font-medium text-gray-400 group-hover:text-[#1ca350] transition-colors">Guardian
                                    Photo</span>
                                <input type="file" name="guardian_photo" class="hidden" accept="image/*">
                            </label>
                        </div>

                        <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-5">
                            <div class="md:col-span-2">
                                <label class="form-label">GUARDIAN NAME</label>
                                <input type="text" name="guardian_name" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">RELATIONSHIP</label>
                                <select name="guardian_relationship" class="form-input form-select">
                                    <option>Father</option>
                                    <option>Mother</option>
                                    <option>Local Guardian</option>
                                </select>
                            </div>

                            <div>
                                <label class="form-label">OCCUPATION</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="guardian_occupation" class="form-input pl-9">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">PHONE NUMBER</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="guardian_phone" class="form-input pl-9">
                                </div>
                            </div>
                            <div>
                                <label class="form-label">GUARDIAN EMAIL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" name="guardian_email" class="form-input pl-9">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======= TAB 3: ACADEMIC ======= -->
            <div id="tab-academic" class="tab-content space-y-6">
                <!-- Academic Admission -->
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Academic Admission (Primary)</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-x-6 gap-y-5">
                        <div>
                            <label class="form-label">ADMISSION PROGRAM <span class="text-red-500">*</span></label>
                            <select name="admission_program" class="form-input form-select">
                                <option>Select</option>
                                <option>Hifz</option>
                                <option>Aalim</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">SESSION / BATCH YEAR <span class="text-red-500">*</span></label>
                            <select name="batch_year" class="form-input form-select">
                                <option>2025</option>
                                <option>2024</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">ADMISSION DATE <span class="text-red-500">*</span></label>
                            <input type="date" name="admission_date" class="form-input text-gray-500">
                        </div>
                        <div>
                            <label class="form-label">CURRENT GRADE / YEAR <span class="text-red-500">*</span></label>
                            <select name="current_grade" class="form-input form-select">
                                <option>Select</option>
                                <option>Year 1</option>
                                <option>Year 2</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">STATUS <span class="text-red-500">*</span></label>
                            <select name="program_status" class="form-input form-select">
                                <option>Active</option>
                                <option>Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-end">
                        <button type="button"
                            class="text-[#3b82f6] text-[13px] font-semibold hover:underline flex items-center gap-1.5 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Add Another Program
                        </button>
                    </div>
                </div>

                <!-- Previous Education -->
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Previous Education</h2>
                    </div>

                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">PREVIOUS SCHOOL DETAILS
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 mb-8">
                        <div>
                            <label class="form-label">SCHOOL NAME</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <input type="text" name="previous_school_name" class="form-input pl-9">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">SCHOOL LOCATION</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="previous_school_location" class="form-input pl-9"
                                    placeholder="City / Town">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">LAST GRADE / CLASS</label>
                            <input type="text" name="last_grade" class="form-input" placeholder="e.g. Grade 5">
                        </div>
                        <div>
                            <label class="form-label">REASON FOR LEAVING SCHOOL</label>
                            <input type="text" name="reason_leaving_school" class="form-input"
                                placeholder="e.g. Transfer">
                        </div>
                    </div>

                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">PREVIOUS MADRASA DETAILS
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        <div>
                            <label class="form-label">MADRASA NAME</label>
                            <input type="text" name="madrasa_name" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">MADRASA LOCATION</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 pt-2.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="madrasa_location" class="form-input pl-9"
                                    placeholder="City / Town">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">MEDIUM OF STUDY</label>
                            <select name="medium_of_study" class="form-input form-select">
                                <option>Tamil</option>
                                <option>English</option>
                                <option>Sinhala</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">REASON FOR LEAVING MADRASA</label>
                            <input type="text" name="reason_leaving_madrasa" class="form-input"
                                placeholder="e.g. Completed Hifz">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======= TAB 4: DOCUMENTS ======= -->
            <div id="tab-documents" class="tab-content">
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 p-7">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <h2 class="text-[15px] font-bold text-gray-800">Documents & Proofs</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php
                        $doc_cards = [
                            ['NIC FRONT', 'doc_nic_front'],
                            ['NIC BACK', 'doc_nic_back'],
                            ['SIGNATURE', 'doc_signature'],
                            ['BIRTH CERT.', 'doc_birth_cert'],
                            ['MEDICAL REPORT', 'doc_medical_report'],
                            ['GUARDIAN NIC', 'doc_guardian_nic'],
                            ['GUARDIAN PHOTO', 'doc_guardian_photo'],
                            ['LEAVING CERT.', 'doc_leaving_cert'],
                        ];
                        foreach ($doc_cards as $doc):
                            ?>
                            <div>
                                <label class="form-label">
                                    <?php echo $doc[0]; ?>
                                </label>
                                <label
                                    class="border-2 border-dashed border-gray-200 rounded-xl h-32 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 hover:border-[#1ca350] transition-colors mt-2 group">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-300 mb-2 group-hover:text-[#1ca350] transition-colors"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span
                                        class="text-[11px] font-medium text-gray-400 group-hover:text-[#1ca350] transition-colors">Click
                                        to upload</span>
                                    <input type="file" name="<?php echo $doc[1]; ?>" class="hidden">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        // Simple Vanilla JS tab switching
        function switchTab(tabId, btn) {
            const allContent = document.querySelectorAll('.tab-content');
            const allBtns = btn.parentElement.querySelectorAll('button');

            // Hide all tabs
            allContent.forEach(content => {
                content.classList.remove('active');
            });

            // Reset button states
            allBtns.forEach(b => {
                b.className = "pb-3 tab-inactive text-sm transition-colors hover:text-gray-800";
            });

            // Show selected tab
            document.getElementById('tab-' + tabId).classList.add('active');

            // Active button state
            btn.className = "pb-3 tab-active text-sm transition-colors";
        }
    </script>
</body>

</html>