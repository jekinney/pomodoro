<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({ session: Object });

const page = usePage();

const form = useForm({
    session_id: page.props.session.id
});

function end() {
    form.post(route('session.start'), {
        preserveScroll: true
    })
}

function start() {
    form.post(route('session.start'), {
        preserveScroll: true
    });
}
</script>

<template>
    <AppLayout title="Session">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Session
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-lg mx-auto sm:px-10 lg:px-6">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="m-4 space-y-6">
                        <header class="flex items-center justify-between m-4">
                            <h2 class="text-lg font-bold text-gray-800">{{  session.display_name }}</h2>
                            <p class="text-sm text-gray-500">Created on: {{  session.created_at }} by {{ session.user.name }}</p>
                        </header>
                        <article class="w-full border-t-2 border-gray-800 rounded-none">
                            <dl class="text-center text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400 ">Loops</dt>
                                    <dd class="text-lg font-semibold">{{  session.loops }}</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Work Minutes</dt>
                                    <dd class="text-lg font-semibold">{{  session.work_time }}</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Break Minutes</dt>
                                    <dd class="text-lg font-semibold">{{  session.break_time }}</dd>
                                </div>
                            </dl>
                        </article>
                        <footer class="w-full border-t-2 border-gray-800 rounded-none">
                            <div class="flex items-center justify-between m-4">
                                <button
                                    type="button"
                                    @click="end()"
                                    class="px-2 py-2 text-sm text-white bg-blue-500 rounded-md"
                                >
                                    End Session
                                </button>
                                <button type="button" @click="start()" class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md">Start Session</button>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
