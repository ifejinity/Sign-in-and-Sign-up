<template>
<vue-recaptcha
    theme="light"
    size="normal"
    :tabindex="0"
    @widgetId="recaptchaWidget = $event"
    @verify="callbackVerify($event)"
    @expired="callbackExpired()"
    @fail="callbackFail()"
/>
</template>
<script setup>
    import { ref } from "vue";
    import { VueRecaptcha, useRecaptcha } from "vue3-recaptcha-v2";
    defineProps({
        modelValue: Boolean
    })
    const emits = defineEmits(['update:modelValue'])
    // Reset Recaptcha
    const { resetRecaptcha } = useRecaptcha();
    const recaptchaWidget = ref(null);
    const callbackVerify = (response) => {
        console.log(response);
        emits('update:modelValue', true)
    };
    const callbackExpired = () => {
        console.log("expired!");
        emits('update:modelValue', false)
    };
    const callbackFail = () => {
        console.log("fail");
        emits('update:modelValue', false)
    };
    // Reset Recaptcha action
    const actionReset = () => {
        resetRecaptcha(recaptchaWidget.value);
    };
</script>