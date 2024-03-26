<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({ pomodoro: Object });

const page = usePage();

const form = useForm({
    loops: 1,
    work_time: 1,
    break_time: 1,
    display_name: '',
    pomodoro_id: page.props.pomodoro.id
});

const submit = () => {
    form.post(route('session.store'), {
        preserveScroll: true
    });
}
</script>

<template>
    <AppLayout title="Create Session">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create a New Session
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-10 lg:px-6">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit()" class="m-4 space-y-6 mt-">

                        <div>
                            <label for="pomodoro" class="text-sm font-medium text-gray-900">Pomodoro</label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    id="pomodoro"
                                    :value="pomodoro.display_name"
                                    class="w-full py-2 text-sm text-gray-900 bg-gray-200 border-gray-300"
                                    readonly="true"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="display_name" class="text-sm font-medium text-gray-900">Name</label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    id="display_name"
                                    v-model="form.display_name"
                                    class="w-full py-2 text-sm text-gray-900 border-gray-300"
                                    step="1"
                                    required="true"
                                />
                            </div>
                            <div v-if="form.errors.display_name" class="mt-2 text-sm text-red-500">
                                {{ form.errors.display_name }}
                            </div>
                        </div>

                        <div class="flex justify-between space-x-2 item-center">
                            <div class="w-full">
                                <label for="work_time" class="text-sm font-medium text-gray-900">Work Time (in minutes)</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        id="work_time"
                                        v-model="form.work_time"
                                        class="w-full py-2 text-sm text-gray-900 border-gray-300"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.work_time" class="mt-2 text-sm text-red-500">
                                    {{ form.errors.work_time }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="break_time" class="text-sm font-medium text-gray-900">Break Time (in minutes)</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        id="break_time"
                                        v-model="form.break_time"
                                        class="w-full py-2 text-sm text-gray-900 border-gray-300"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.break_time" class="mt-2 text-sm text-red-500">
                                    {{ form.errors.break_time }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="loops" class="text-sm font-medium text-gray-900">Times to Loop</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        id="loops"
                                        v-model="form.loops"
                                        class="w-full py-2 text-sm text-gray-900 border-gray-300"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.loops" class="mt-2 text-sm text-red-500">
                                    {{ form.errors.loops }}
                                </div>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-blue-500 disabled:opacity-50"
                                :disabled="form.processing"
                            >
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
