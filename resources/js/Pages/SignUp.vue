<template>
    <Layout>
        <Head 
        title="Sign up">
        </Head>
        <div 
        class="section-container min-h-screen flex items-center justify-center">
            <div 
            class="w-full max-w-[500px] grid grid-cols-6 gap-3 shadow-lg px-5 py-7 rounded-[10px] bg-primary">
                <h1
                class="md:text-[35px] text-[20px] font-[700] text-tertiary col-span-6"
                >Sign up</h1>
                <Input 
                class="md:col-span-3 col-span-6"
                v-model="form.first_name" 
                label="First name" 
                :validation-status="form.errors.first_name ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.first_name">
                        {{ form.errors.first_name }}
                    </template>
                </Input>
                <Input 
                class="md:col-span-3 col-span-6"
                v-model="form.last_name" 
                label="Last name"
                :validation-status="form.errors.last_name ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.last_name">
                        {{ form.errors.last_name }}
                    </template>
                </Input>
                <Input 
                class="col-span-6"
                v-model="form.username" 
                label="Username"
                :validation-status="form.errors.username ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.username">
                        {{ form.errors.username }}
                    </template>
                </Input>
                <Input 
                class="col-span-6"
                v-model="form.email" 
                label="Email"
                :validation-status="form.errors.email ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.email">
                        {{ form.errors.email }}
                    </template>
                </Input>
                <Input 
                class="col-span-6"
                v-model="form.password" 
                label="Password"
                type="password"
                :validation-status="form.errors.password ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.password">
                        {{ form.errors.password }}
                    </template>
                </Input>
                <Input 
                class="col-span-6"
                v-model="form.confirm_password" 
                label="Confirm password"
                type="password"
                :validation-status="form.errors.confirm_password ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.confirm_password">
                        {{ form.errors.confirm_password }}
                    </template>
                </Input>
                <div 
                class="flex justify-end col-span-6">
                    <Link
                    href="/"
                    class="text-tertiary hover:text-quaternary font-[700] text-[14px] underline">
                        Sign in
                    </Link>
                </div>
                <Button
                class="bg-tertiary hover:bg-tertiary mt-3 col-span-6"
                size="lg"
                @click="signUp">
                    Sign up
                </Button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
    // imports
    import Layout from "../Shared/PublicLayout.vue";
    import { useForm } from "@inertiajs/vue3";
    import { Input, Button } from 'flowbite-vue'
    import Toastify from 'toastify-js'
    // user form data 
    const form = useForm({
        first_name: null,
        last_name: null,
        username: null,
        email: null,
        password: null,
        confirm_password: null
    })
    // methods
    function signUp() {
        form.post('/sign-up', {
            preserveState: true,
            onError: () => {
                Toastify({
                    text: "Sign up failed.",
                    className: "info rounded-[8px]",
                    style: {
                        background: "#ef4444",
                    }
                }).showToast();
            },
            onSuccess: () => {
                Toastify({
                    text: "Sign up success.",
                    className: "info rounded-[8px]",
                    style: {
                        background: "#22c55e",
                    }
                }).showToast();
                form.reset();
            }
        })
    }
</script>

<style lang="scss" scoped>

</style>