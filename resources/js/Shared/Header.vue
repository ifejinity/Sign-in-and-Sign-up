<template>
    <div class="w-full p-5 flex justify-between items-center bg-primary shadow-sm">
        <h1></h1>
        <button>
            <Avatar 
            rounded 
            img="https://flowbite.com/docs/images/people/profile-picture-5.jpg" 
            size="md"
            @click="signOut"/>
        </button>
    </div>
</template>

<script setup>
    // imports
    import { router } from '@inertiajs/vue3';
    import { Avatar } from 'flowbite-vue'
    // methods
    function signOut() {
        router.post('/sign-out');
    }
</script>

<style lang="scss" scoped>

</style>