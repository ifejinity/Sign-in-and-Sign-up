<template>
    <Layout>
        <Head 
        title="Sign in">
        </Head>
        <div 
        class="section-container min-h-screen flex items-center justify-center">
            <div 
            class="w-full max-w-[500px] grid grid-cols-1 gap-3 shadow-lg px-5 py-7 rounded-[10px] bg-primary my-7">
                <h1
                class="md:text-[35px] text-[20px] font-[700] text-tertiary"
                >Sign in</h1>
                <Input 
                v-model="form.username" 
                placeholder="Enter your username" 
                label="Username" 
                :validation-status="form.errors.username ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.username">
                        {{ form.errors.username }}
                    </template>
                </Input>
                <Input 
                v-model="form.password" 
                placeholder="Enter your password" 
                label="Password"
                type="password"
                :validation-status="form.errors.password ? 'error' : ''">
                    <template #validationMessage v-if="form.errors.password">
                        {{ form.errors.password }}
                    </template>
                </Input>
                <div 
                class="flex justify-between">
                    <Checkbox 
                    v-model="form.remember" 
                    label="Remember me" 
                    class="w-fit"/>
                    <Link
                    href="sign-up-page"
                    class="text-tertiary hover:text-quaternary font-[700] text-[14px] underline">
                        Sign up
                    </Link>
                </div>
                <Button
                class="bg-tertiary hover:bg-tertiary mt-3"
                size="lg"
                @click="signIn">
                    Sign in
                </Button>
            </div>
        </div>
    </Layout>
</template>

<script setup>
    // imports
    import Layout from "@/Shared/PublicLayout.vue";
    import { useForm } from "@inertiajs/vue3";
    import { Input, Button, Checkbox } from 'flowbite-vue'
    import Toastify from 'toastify-js'
    // user form data 
    const form = useForm({
        username: null,
        password: null,
        remember: false
    })
    // methods
    function signIn() {
        form.post('/sign-in', {
            preserveState: true,
            onError: () => {
                Toastify({
                    text: "Sign in failed.",
                    className: "info rounded-[8px]",
                    style: {
                        background: "#ef4444",
                    }
                }).showToast();
            },
            onSuccess: () => {
                Toastify({
                    text: "Sign in success.",
                    className: "info rounded-[8px]",
                    style: {
                        background: "#22c55e",
                    }
                }).showToast();
            }
        })
    }
</script>

<style lang="scss" scoped>

</style>