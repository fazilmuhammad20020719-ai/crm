<?php
// Sidebar Component
?>
<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .no-scrollbar {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>
<aside class="bg-[#1ca350] text-white w-64 h-screen fixed left-0 top-0 flex flex-col z-20">
    <!-- Fixed Header -->
    <div class="px-6 pt-6 pb-6 flex items-center justify-center gap-3 shrink-0">
        <div class="bg-white rounded-full p-1 h-12 w-12 flex items-center justify-center overflow-hidden shrink-0">
            <img src="images/logo.png" alt="College Logo" class="h-full w-full object-contain rounded-full"
                onerror="this.src='https://via.placeholder.com/80?text=Logo'">
        </div>
        <span class="font-bold text-[15px] tracking-wide">FMAC Central</span>
    </div>

    <!-- Scrollable Navigation Area -->
    <div class="flex-1 overflow-y-auto no-scrollbar pb-4">
        <nav class="px-4 space-y-1">
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 bg-white rounded-lg text-[#1ca350] font-bold text-[13.5px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Dashboard
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Calendar
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Schedule
            </a>

            <!-- Section 1 -->
            <div class="pt-6 pb-2">
                <p class="px-4 text-[10px] font-bold text-white/60 tracking-wider uppercase">Directory</p>
            </div>
            <a href="add_student.php"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Students
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Teachers
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Management Team
            </a>

            <!-- Section 2 -->
            <div class="pt-6 pb-2">
                <p class="px-4 text-[10px] font-bold text-white/60 tracking-wider uppercase">Academic</p>
            </div>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Programs
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                Attendance
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Exams & Results
            </a>

            <!-- Section 3 -->
            <div class="pt-6 pb-2">
                <p class="px-4 text-[10px] font-bold text-white/60 tracking-wider uppercase">Office</p>
            </div>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                Documents
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-2.5 hover:bg-white/10 rounded-lg text-white/90 hover:text-white font-medium text-[13.5px] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                Subscription
            </a>
        </nav>
    </div>

    <!-- Fixed User Profile Footer -->
    <div class="px-3 pb-4 pt-2 bg-[#1ca350] border-t border-white/10 shrink-0">
        <div class="bg-black/20 rounded-xl p-3 flex items-center justify-between">
            <div class="flex items-center gap-3 overflow-hidden">
                <div
                    class="h-9 w-9 bg-white text-[#1ca350] rounded-full flex items-center justify-center font-bold text-sm shrink-0 shadow-sm">
                    <?php echo isset($admin_username) ? strtoupper(substr($admin_username, 0, 1)) : 'A'; ?>
                </div>
                <div class="truncate">
                    <p class="text-[13px] font-bold text-white truncate">
                        <?php echo isset($admin_username) ? ucfirst($admin_username) : 'Admin'; ?>
                    </p>
                    <p class="text-[10px] text-white/70">Admin</p>
                </div>
            </div>
            <a href="../backend/logout.php"
                class="p-2 hover:bg-white/10 rounded-lg text-white/80 hover:text-white transition-colors"
                title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </div>
    </div>
</aside>