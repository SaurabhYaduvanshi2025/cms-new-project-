<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: ../../dashboard.php');
    exit;
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../../../public/assets/css/style.css">
</head>

<body class="min-h-screen bg-stone-50 text-slate-900">
    <main class="flex min-h-screen items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
        <section class="grid w-full max-w-5xl overflow-hidden rounded-lg border border-slate-200 bg-white shadow-xl lg:grid-cols-[1fr_420px]">
            <!-- <div class="hidden bg-slate-950 p-10 text-white lg:flex lg:flex-col lg:justify-between">
                <div>
                    <div class="mb-12 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-400 text-xl font-bold text-slate-950">
                        C
                    </div>
                    <h1 class="max-w-sm text-4xl font-bold leading-tight">
                        CMS admin control panel
                    </h1>
                    <p class="mt-4 max-w-md text-sm leading-6 text-slate-300">
                        Manage your site content, review activity, and keep admin tasks in one clean workspace.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-3 text-sm">
                    <div class="rounded-lg border border-white/10 bg-white/5 p-4">
                        <span class="block text-2xl font-semibold">24</span>
                        <span class="text-slate-400">Posts</span>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/5 p-4">
                        <span class="block text-2xl font-semibold">12</span>
                        <span class="text-slate-400">Pages</span>
                    </div>
                    <div class="rounded-lg border border-white/10 bg-white/5 p-4">
                        <span class="block text-2xl font-semibold">8</span>
                        <span class="text-slate-400">Users</span>
                    </div>
                </div>
            </div> -->

            <div class="p-6 sm:p-8 lg:p-10">
                <div class="mb-8 lg:hidden">
                    <div class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-slate-950 text-xl font-bold text-white">
                        C
                    </div>
                    <h1 class="text-3xl font-bold">CMS Admin</h1>
                    <p class="mt-2 text-sm text-slate-500">Sign in to continue to your dashboard.</p>
                </div>

                <div class="mb-8 hidden lg:block">
                    <h2 class="text-2xl font-bold">Welcome back</h2>
                    <p class="mt-2 text-sm text-slate-500">Enter your admin credentials to continue.</p>
                </div>

                <?php if ($error): ?>
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-700">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form action="../../controllers/AuthController.php" method="POST" class="space-y-5">
                    <div>
                        <label for="username" class="mb-2 block text-sm font-semibold text-slate-700">
                            Username
                        </label>
                        <input
                            id="username"
                            type="text"
                            name="username"
                            autocomplete="username"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
                            placeholder="admin">
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100"
                            placeholder="Enter password">
                    </div>

                    <button
                        type="submit"
                        class="flex w-full items-center justify-center rounded-lg bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-200">
                        Login
                    </button>
                </form>
            </div>
        </section>
    </main>

</body>
</html>
