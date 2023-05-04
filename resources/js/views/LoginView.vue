<template>
    <div class="flex h-screen justify-center items-center">
        <LoginFormComponent/>
    </div>
</template>

<script>
import LoginFormComponent from '../components/forms/LoginFormComponent.vue';

export default {
    name: 'LoginView',
    components: {
        LoginFormComponent
    }
}
</script>
