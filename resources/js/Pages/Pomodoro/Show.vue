<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({ pomodoro: Object });
</script>

<template>
    <AppLayout title="UPomodoro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pomodoro
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-10 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <header class="m-4 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-800">{{  pomodoro.display_name }}</h2>
                        <p class="text-sm text-gray-500">Created on: {{  pomodoro.created_at }}</p>
                    </header>
                    <article class="border-t-2 border-gray-800 rounded-none w-full">
                        <p class="m-4">{{  pomodoro.description }}</p>
                    </article>
                </div>
            </div>
            <div class="max-w-xl mt-4 mx-auto sm:px-10 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <header class="m-4 flex justify-between items-center">
                        <h2 class="text-lg font-bold text-gray-800">Sessions</h2>
                        <Link :href="route('session.create', pomodoro.id)" class="text-sm text-white bg-blue-500 py-1 px-2 rounded-lg">Create Session</Link>
                    </header>
                    <table class="table-auto border-t-2 border-gray-800 rounded-none w-full">
                        <thead>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Name</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Work</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Break</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Loops</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Historical</td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">Options</td>
                        </thead>
                        <tbody>
                            <tr v-for="session in pomodoro.sessions">
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{  session.display_name }}
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{  session.work_time }}
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{  session.break_time }}
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{  session.loops }}
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                    {{  session.history_count }}
                                </td>
                                <td class="flex justify-between items-center">
                                    <Link :href="route('session.show', session.id)" class="text-xs text-white bg-blue-500 py-1 px-2 rounded-md">Show</Link>
                                    <Link :href="route('session.edit', session.id)" class="text-xs text-white bg-blue-500 py-1 px-2 rounded-md">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
