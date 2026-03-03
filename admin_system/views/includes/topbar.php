<?php
// Topbar Component
$current_date = date('F j, Y');
?>
<header class="bg-white px-8 py-5 flex justify-between items-center sticky top-0 z-10">
    <h1 class="text-[22px] font-bold text-gray-800">Dashboard Overview</h1>

    <div class="flex items-center gap-4">
        <div
            class="flex items-center gap-2 px-4 py-2 border border-gray-200 rounded-lg bg-white shadow-sm text-sm font-medium text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <?php echo $current_date; ?>
        </div>
        <button
            class="p-2 border border-gray-200 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-50 bg-white shadow-sm transition-colors relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Notification Badge indicator -->
            <span class="absolute top-2 right-2.5 h-1.5 w-1.5 bg-red-500 rounded-full"></span>
        </button>
    </div>
</header>