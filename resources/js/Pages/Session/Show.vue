<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({ session: Object });

</script>

<template>
    <AppLayout title="Session">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Session
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-10 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="space-y-6 m-4">

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
