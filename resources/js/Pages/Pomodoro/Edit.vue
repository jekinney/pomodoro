<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { onMounted } from "vue";

const page = usePage();

defineProps({ pomodoros: Object });

const form = useForm({
    _method: 'PATCH',
    display_name: '',
    description: '',
});

onMounted(() => {
    form.display_name = page.props.pomodoro.display_name;
    form.description = page.props.pomodoro.description;
});

const submit = () => {
    form.post(route('pomodoro.update', page.props.pomodoro.id), {
        preserveScroll: true
    });
}
</script>

<template>
    <AppLayout title="Update Pomodoro">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update a Pomodoro
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-10 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit()" class="space-y-6 m-4">

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

                        <div>
                            <label for="description" class="text-sm font-medium text-gray-900">Description</label>
                            <div class="mt-2">
                                <input
                                    type="text"
                                    id="description"
                                    v-model="form.description"
                                    class="w-full py-2 text-gray-900 border-gray-300 text-sm"
                                    step="2"
                                    required="true"
                                />
                            </div>
                            <div v-if="form.errors.description" class="text-sm text-red-500 mt-2">
                                {{ form.errors.description }}
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
