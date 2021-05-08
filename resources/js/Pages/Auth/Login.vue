<template>
<app-Layout>
<div class="login">
    
    <div v-if="status" class="">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="d-flex flex-column justify-content-around form-group mt-3">
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="form-control mb-1" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="form-control mb-1" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="">
                    Forgot your password?
                </inertia-link>
                <br>
                <jet-button class="ml-4 btn btn-info text-dark"  :class=" form.processing  " :disabled="form.processing" >
                    Log in
                </jet-button>
            </div>
        </form>

</div>
</app-Layout>
</template>

<script>
    
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AppLayout from "./../../Layouts/AppLayout";

    export default {
        components: {
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            AppLayout
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
<style scoped>
    .login
    {
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>