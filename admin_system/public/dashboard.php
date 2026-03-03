<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    // Not logged in, redirect to login page
    $_SESSION['login_error'] = "Please log in to access the dashboard.";
    header("Location: index.php");
    exit();
}

$admin_username = htmlspecialchars($_SESSION['admin_username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Faizanul Madeena</title>
    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f0f2f5] min-h-screen text-gray-900 font-sans antialiased">

    <!-- Include Sidebar -->
    <?php include __DIR__ . '/../views/includes/sidebar.php'; ?>

    <!-- Main Content Wrapper (offset for fixed sidebar) -->
    <div class="ml-64 flex flex-col min-h-screen">

        <!-- Include Topbar -->
        <?php include __DIR__ . '/../views/includes/topbar.php'; ?>

        <!-- Dashboard Main View -->
        <main class="flex-1 p-8">

            <!-- Stats Widgets Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Widget 1: Total Students -->
                <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col justify-between">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="bg-indigo-50 text-indigo-500 h-14 w-14 rounded-xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-gray-800 leading-none mb-1">6</h3>
                            <p class="text-[13px] font-medium text-gray-500">Total Students</p>
                        </div>
                    </div>
                    <a href="#"
                        class="text-[11px] font-semibold text-gray-400 hover:text-indigo-500 flex items-center gap-1 mt-auto">
                        View Directory &rarr;
                    </a>
                </div>

                <!-- Widget 2: Student Attendance -->
                <div
                    class="bg-white rounded-xl shadow-sm p-6 flex flex-col justify-between border border-transparent hover:border-green-100 transition-colors">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="bg-green-50 text-green-500 h-14 w-14 rounded-xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-gray-800 leading-none mb-1">0%</h3>
                            <p class="text-[13px] font-medium text-gray-500 leading-tight">Today Student Attendance</p>
                        </div>
                    </div>
                    <p class="text-[11px] font-semibold text-gray-400 mt-auto">
                        0 / 6 Present &rarr;
                    </p>
                </div>

                <!-- Widget 3: Teacher Attendance -->
                <div
                    class="bg-white rounded-xl shadow-sm p-6 flex flex-col justify-between border border-transparent hover:border-blue-100 transition-colors">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="bg-blue-50 text-blue-500 h-14 w-14 rounded-xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-gray-800 leading-none mb-1">0%</h3>
                            <p class="text-[13px] font-medium text-gray-500 leading-tight">Today Teacher Attendance</p>
                        </div>
                    </div>
                    <p class="text-[11px] font-semibold text-gray-400 mt-auto">
                        0 / 2 Present &rarr;
                    </p>
                </div>

                <!-- Widget 4: Documents -->
                <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col justify-between">
                    <div class="flex items-start gap-4 mb-4">
                        <div
                            class="bg-purple-50 text-purple-500 h-14 w-14 rounded-xl flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-gray-800 leading-none mb-1">0</h3>
                            <p class="text-[13px] font-medium text-gray-500">Documents</p>
                        </div>
                    </div>
                    <a href="#"
                        class="text-[11px] font-semibold text-gray-400 hover:text-purple-500 flex items-center gap-1 mt-auto">
                        File Repository &rarr;
                    </a>
                </div>
            </div>

            <!-- Quick Actions Banner -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 mb-8 flex items-center justify-between border border-gray-100">
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Quick Actions</h2>
                    <p class="text-sm text-gray-500">Manage students and admissions efficiently.</p>
                </div>
                <a href="add_student.php"
                    class="bg-[#e68a35] hover:bg-[#d67b28] text-white px-5 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2 transition-colors shadow-sm w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Add Student
                </a>
            </div>

            <!-- Recent Activity List -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-base font-bold text-gray-800">Recent Office Activities</h2>
                </div>

                <div class="space-y-6">
                    <!-- Activity 1 -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-indigo-50 text-indigo-500 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[13px] font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">
                                    New Student</p>
                                <p class="text-[12px] text-gray-500">M.N. MOHAMED SAADIQ joined</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 font-medium">Jan 29, 12:47 PM</p>
                    </div>

                    <!-- Activity 2 -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-purple-50 text-purple-500 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[13px] font-bold text-gray-800 group-hover:text-purple-600 transition-colors">
                                    New Teacher</p>
                                <p class="text-[12px] text-gray-500">MuhammadAmin joined</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 font-medium">Jan 25, 05:30 AM</p>
                    </div>

                    <!-- Activity 3 -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-purple-50 text-purple-500 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[13px] font-bold text-gray-800 group-hover:text-purple-600 transition-colors">
                                    New Teacher</p>
                                <p class="text-[12px] text-gray-500">Fazil muhammad joined</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 font-medium">Jan 25, 05:30 AM</p>
                    </div>

                    <!-- Activity 4 -->
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-indigo-50 text-indigo-500 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-[13px] font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">
                                    New Student</p>
                                <p class="text-[12px] text-gray-500">Aash Bbm joined</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 font-medium">Jan 19, 03:33 PM</p>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>

</html>