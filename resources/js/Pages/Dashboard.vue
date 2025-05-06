<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-gray-100 rounded-lg shadow-md">
                    <!-- Content Card -->
                    <a href="/contents" class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-6 flex flex-col items-center text-center group">
                        <svg class="w-12 h-12 text-indigo-500 group-hover:text-indigo-700 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-700">Contentlar</h3>
                    </a>

                    <!-- Author Card -->
                    <a href="/authors" class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-6 flex flex-col items-center text-center group">
                        <svg class="w-12 h-12 text-green-500 group-hover:text-green-700 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M5.121 17.804A9.001 9.001 0 0112 3a9 9 0 016.879 14.804M15 21H9m6 0a3 3 0 00-6 0" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-700">Authorlar</h3>
                    </a>

                    <!-- Genre Card -->
                    <a href="/genres" class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-6 flex flex-col items-center text-center group">
                        <svg class="w-12 h-12 text-purple-500 group-hover:text-purple-700 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4V4z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-purple-700">Genrelar</h3>
                    </a>

                    <!-- Category Card -->
                    <a href="/categories" class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-6 flex flex-col items-center text-center group">
                        <svg class="w-12 h-12 text-blue-500 group-hover:text-blue-700 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-700">Categorylar</h3>
                    </a>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
