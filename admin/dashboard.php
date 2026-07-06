<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: views/auth/login.php');
    exit;
}

$admin = $_SESSION['admin'];
$adminName = $admin['name'] ?? 'Administrator';
$adminUsername = $admin['username'] ?? 'admin';
$avatar = trim((string) ($admin['avatar'] ?? ''));
$avatarText = $avatar !== '' ? strtoupper(substr($avatar, 0, 1)) : strtoupper(substr($adminName, 0, 1));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body class="min-h-screen bg-stone-50 text-slate-900">
    <div class="flex min-h-screen">
        <aside class="hidden w-64 border-r border-slate-200 bg-white px-5 py-6 lg:block">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-slate-950 text-lg font-bold text-white">
                    C
                </div>
                <div>
                    <p class="text-base font-bold">CMS Admin</p>
                    <p class="text-xs text-slate-500">Control Panel</p>
                </div>
            </div>

            <nav class="mt-10 space-y-1">
                <a href="dashboard.php" class="flex items-center rounded-lg bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                    Dashboard
                </a>
                <a href="#" class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Posts
                </a>
                <a href="#" class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Pages
                </a>
                <a href="#" class="flex items-center rounded-lg px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    Settings
                </a>
            </nav>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="border-b border-slate-200 bg-white">
                <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Dashboard</p>
                        <h1 class="text-xl font-bold sm:text-2xl">Welcome, <?= htmlspecialchars($adminName) ?></h1>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right sm:block">
                            <p class="text-sm font-semibold"><?= htmlspecialchars($adminName) ?></p>
                            <p class="text-xs text-slate-500">@<?= htmlspecialchars($adminUsername) ?></p>
                        </div>

                        <button
                            type="button"
                            title="Admin avatar"
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-500 text-sm font-bold text-white ring-4 ring-emerald-100">
                            <?= htmlspecialchars($avatarText) ?>
                        </button>

                        <a
                            href="logout.php"
                            class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-red-200 hover:bg-red-50 hover:text-red-700">
                            Logout
                        </a>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
                <!-- <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Total Posts</p>
                        <p class="mt-3 text-3xl font-bold">24</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Published Pages</p>
                        <p class="mt-3 text-3xl font-bold">12</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Admin Users</p>
                        <p class="mt-3 text-3xl font-bold">8</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Pending Reviews</p>
                        <p class="mt-3 text-3xl font-bold">5</p>
                    </div>
                </section> -->

                <section class="mt-6 grid gap-6 xl:grid-cols-[1fr_360px]">
                    <!-- <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="mb-5 flex items-center justify-between">
                            <h2 class="text-lg font-bold">Recent Activity</h2>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">Today</span>
                        </div>

                        <div class="divide-y divide-slate-100">
                            <div class="flex items-center justify-between gap-4 py-4">
                                <div>
                                    <p class="font-semibold">Homepage content updated</p>
                                    <p class="text-sm text-slate-500">Edited by <?= htmlspecialchars($adminName) ?></p>
                                </div>
                                <span class="text-sm text-slate-500">09:30</span>
                            </div>
                            <div class="flex items-center justify-between gap-4 py-4">
                                <div>
                                    <p class="font-semibold">New blog draft created</p>
                                    <p class="text-sm text-slate-500">Waiting for review</p>
                                </div>
                                <span class="text-sm text-slate-500">11:15</span>
                            </div>
                            <div class="flex items-center justify-between gap-4 py-4">
                                <div>
                                    <p class="font-semibold">Settings checked</p>
                                    <p class="text-sm text-slate-500">No changes required</p>
                                </div>
                                <span class="text-sm text-slate-500">13:45</span>
                            </div>
                        </div>
                    </div> -->

                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <h2 class="text-lg font-bold">Admin Profile</h2>
                        <div class="mt-5 flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-emerald-500 text-xl font-bold text-white">
                                <?= htmlspecialchars($avatarText) ?>
                            </div>
                            <div>
                                <p class="font-bold"><?= htmlspecialchars($adminName) ?></p>
                                <p class="text-sm text-slate-500">@<?= htmlspecialchars($adminUsername) ?></p>
                            </div>
                        </div>

                        <div class="mt-6 rounded-lg bg-slate-50 p-4">
                            <p class="text-sm font-semibold text-slate-700">Session status</p>
                            <p class="mt-1 text-sm text-slate-500">You are logged in as admin.</p>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>
