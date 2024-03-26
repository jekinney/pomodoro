<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({ pomodoro: Object });

const page = usePage();

const form = useForm({
    pomodoro_id: page.props.pomodoro.id,
    display_name: '',
    work_time: null,
    break_time: null,

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a New Session
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-10 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit()" class="mt- space-y-6 m-4">

                        <div>
                            <label for="display_name" class="text-sm font-medium text-gray-900">Pomodoro</label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    id="display_name"
                                    :value="pomodoro.display_name"
                                    class="w-full py-2 text-gray-900 border-gray-300 text-sm bg-gray-200"
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
                                    class="w-full py-2 text-gray-900 border-gray-300 text-sm"
                                    step="1"
                                    required="true"
                                />
                            </div>
                            <div v-if="form.errors.display_name" class="text-sm text-red-500 mt-2">
                                {{ form.errors.display_name }}
                            </div>
                        </div>

                        <div class="flex justify-between item-center space-x-2">
                            <div class="w-full">
                                <label for="work_time" class="text-sm font-medium text-gray-900">Work Time (in seconds)</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        id="work_time"
                                        v-model="form.work_time"
                                        class="w-full py-2 text-gray-900 border-gray-300 text-sm"
                                        step="2"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.work_time" class="text-sm text-red-500 mt-2">
                                    {{ form.errors.work_time }}
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="break_time" class="text-sm font-medium text-gray-900">Break Time (in seconds)</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        id="break_time"
                                        v-model="form.break_time"
                                        class="w-full py-2 text-gray-900 border-gray-300 text-sm"
                                        step="3"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.break_time" class="text-sm text-red-500 mt-2">
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
                                        class="w-full py-2 text-gray-900 border-gray-300 text-sm"
                                        step="3"
                                        required="true"
                                    />
                                </div>
                                <div v-if="form.errors.loops" class="text-sm text-red-500 mt-2">
                                    {{ form.errors.loops }}
                                </div>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="flex w-full justify-center bg-blue-500 px-3 py-2 text-sm font-semibold text-white disabled:opacity-50"
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
