<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({ pomodoros: Object });
</script>

<template>
    <AppLayout title="Pomodoro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pomodoros
            </h2>
            <Link
                :href="route('pomodoro.create')"
                class="text-grey-900 flex p-2 pl-3 text-sm font-semibold"
            >
                Create Pomodoro
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="table-auto w-full">
                        <thead>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">Id</th>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">Name</th>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">Created</th>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">Sessions</th>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">History</th>
                            <th class="border-b border-slate-100 dark:border-slate-700 p-4 dark:text-slate-400">Options</th>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800">
                            <tr v-for="pomodoro in pomodoros">
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{  pomodoro.id }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{  pomodoro.display_name }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{  pomodoro.created_at }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{  pomodoro.sessions_count }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{  pomodoro.history_count }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 space-x-3">
                                    <Link :href="route('pomodoro.show', pomodoro.id)" class="">Show</Link>
                                    <Link :href="route('pomodoro.edit', pomodoro.id)" class="">Edit</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
