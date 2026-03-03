<?php
$error_message = '';
if (isset($_SESSION['login_error'])) {
    $error_message = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin System - Login</title>
    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen m-0 antialiased text-gray-900">
    <div
        class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] w-full max-w-[400px] mx-4 sm:mx-0 overflow-hidden flex flex-col">
        <!-- Header Section -->
        <div class="bg-[#1ca350] px-8 py-8 flex flex-col items-center justify-center text-center">
            <div
                class="bg-white rounded-full p-1 h-[88px] w-[88px] mb-4 shadow-sm flex items-center justify-center overflow-hidden">
                <!-- Using college logo -->
                <img src="images/logo.png" alt="College Logo" class="h-full w-full object-contain rounded-full"
                    onerror="this.src='https://via.placeholder.com/120?text=Logo'">
            </div>
            <h2 class="text-white text-[1.10rem] font-bold leading-tight mb-1">Faizanul Madeena Arabic College</h2>
            <p class="text-[#a5e3be] text-xs font-medium">Office Admin Portal</p>
        </div>

        <!-- Form Section -->
        <div class="px-8 py-8">
            <?php if (!empty($error_message)): ?>
                <div
                    class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-5 border border-red-100 text-center font-medium">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <form action="../backend/login.php" method="POST" class="flex flex-col">
                <div class="mb-5">
                    <label for="username" class="block text-[12px] font-bold text-gray-700 mb-1.5">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter username"
                        autocomplete="off"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:border-[#1ca350] focus:ring-1 focus:ring-[#1ca350] transition-colors placeholder-gray-400">
                </div>

                <div class="mb-2">
                    <label for="password" class="block text-[12px] font-bold text-gray-700 mb-1.5">Password</label>
                    <div class="relative flex items-center">
                        <input type="password" id="password" name="password" required placeholder="Enter password"
                            autocomplete="new-password"
                            class="w-full pl-4 pr-10 py-3 bg-white border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:border-[#1ca350] focus:ring-1 focus:ring-[#1ca350] transition-colors placeholder-gray-400">
                        <button type="button"
                            class="absolute right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
                            aria-label="Toggle password visibility" onclick="togglePassword()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex justify-end mb-6">
                    <a href="#" class="text-xs font-medium text-gray-500 hover:text-[#1ca350] transition-colors">Forgot
                        Password?</a>
                </div>

                <button type="submit"
                    class="w-full py-[11px] bg-[#1ca350] hover:bg-[#188c44] text-white font-bold rounded-lg text-[13px] shadow-[0_4px_12px_rgba(28,163,80,0.3)] transition-all hover:shadow-[0_6px_16px_rgba(28,163,80,0.4)] hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    Access Dashboard
                    <span class="text-sm leading-none">&rarr;</span>
                </button>



                <div class="mt-8 pt-4 border-t border-gray-100 text-center">
                    <p class="text-[11px] text-gray-400">Authorized Personnel Only &bull; v2.5.0</p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>

</html>