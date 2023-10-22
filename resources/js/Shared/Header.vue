<template>
    <div class="w-full p-3 flex justify-between items-center bg-primary shadow-sm">
        <Link
        href="#"
        class="flex items-center gap-3 rounded-[8px] hover:bg-gray-200 p-2">
            <Avatar 
            rounded 
            img="https://flowbite.com/docs/images/people/profile-picture-5.jpg" 
            size="md"/>
            <h1>
                {{ $page.props.User.username }}
            </h1>
        </Link>
        <button
        class="button-primary"
        @click="signOut">
            Sign out
        </button>
    </div>
</template>

<script setup>
    // imports
    import { router } from '@inertiajs/vue3';
    import { Avatar } from 'flowbite-vue'
    import Swal from 'sweetalert2'
    // methods
    function signOut() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You're about to sign out.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#005691',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                router.post('/sign-out');
            }
        })
    }
</script>

<style lang="scss" scoped>

</style>