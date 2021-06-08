<template>
    <Layout>
        <div class="level">
            <div class="level-left">
                <h1 class="title is-4">Create User</h1>
            </div>
            <div class="level-right">
                <inertia-link
                    :href="route('users.index')"
                    class="button is-light"
                >
                    Back
                </inertia-link>
            </div>
        </div>

        <hr>

        <form @submit.prevent="submit">
            <div class="field">
                <label for="name" class="label">Full Name</label>
                <div class="control">
                    <input type="text" v-model="form.name" id="name" class="input">
                </div>
                <p v-if="errors.name" class="help is-danger">
                    {{ errors.name }}
                </p>
            </div>
            <div class="field">
                <label for="email" class="label">Email Address</label>
                <div class="control">
                    <input type="email" v-model="form.email" id="email" class="input">
                </div>
                <p v-if="errors.email" class="help is-danger">
                    {{ errors.email }}
                </p>
            </div>
            <div class="field">
                <label class="checkbox">
                    <input type="checkbox" v-model="form.verified"> Verified Email?
                </label>
            </div>
            <div class="field">
                <label for="password" class="label">Password</label>
                <div class="control">
                    <input type="password" v-model="form.password" id="password" class="input">
                </div>
                <p v-if="errors.password" class="help is-danger">
                    {{ errors.password }}
                </p>
            </div>
            <div class="field">
                <button type="submit" class="button is-primary">Save</button>
            </div>
        </form>
        
    </Layout>
</template>

<script>
import Layout from './../Components/Layout'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    props: {
        errors: Object
    },

    components: {
        Layout
    },

    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            verified: false
        })

        return { form }
    },

    methods: {
        submit() {
            this.form.post(this.route('users.store'), {
                preserveScroll: true,
            })
        }
    }
}
</script>