<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({ pomodoro: Object });
</script>

<template>
    <AppLayout title="UPomodoro">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Pomodoro
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-10 lg:px-6">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <header class="flex items-center justify-between m-4">
                        <h2 class="text-lg font-bold text-gray-800">{{  pomodoro.display_name }}</h2>
                        <p class="text-sm text-gray-500">Created on: {{  pomodoro.created_at }}</p>
                    </header>
                    <article class="w-full border-t-2 border-gray-800 rounded-none">
                        <p class="m-4">{{  pomodoro.description }}</p>
                    </article>
                </div>
            </div>
            <div class="max-w-2xl mx-auto mt-4 sm:px-10 lg:px-6">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <header class="flex items-center justify-between m-4">
                        <h2 class="text-lg font-bold text-gray-800">Sessions</h2>
                        <Link :href="route('session.create', pomodoro.id)" class="px-2 py-1 text-sm text-white bg-blue-500 rounded-lg">Create Session</Link>
                    </header>
                    <table class="w-full border-t-2 border-gray-800 rounded-none table-auto">
                        <thead>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Name</td>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Work</td>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Break</td>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Loops</td>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Historical</td>
                            <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">Options</td>
                        </thead>
                        <tbody>
                            <tr v-for="session in pomodoro.sessions">
                                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    {{  session.display_name }}
                                </td>
                                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    {{  session.work_time }}
                                </td>
                                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    {{  session.break_time }}
                                </td>
                                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    {{  session.loops }}
                                </td>
                                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    {{  session.history_count }}
                                </td>
                                <td class="flex items-center justify-between mt-3 mr-4">
                                    <Link :href="route('session.show', [{ id: session.id }])" class="px-2 py-1 text-xs text-white bg-blue-500 rounded-md">Show</Link>
                                    <Link :href="route('session.edit', session.id)" class="px-2 py-1 text-xs text-white bg-blue-500 rounded-md">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
