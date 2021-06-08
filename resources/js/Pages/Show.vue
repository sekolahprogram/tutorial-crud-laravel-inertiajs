<template>
    <Layout
        :message="flash.message"
    >
        <div class="level">
            <div class="level-left">
                <h1 class="title is-4">Detail User</h1>
            </div>
            <div class="level-right buttons">
                <inertia-link
                    :href="route('users.edit', user.id)"
                    class="button is-light"
                >
                    Edit
                </inertia-link>
                <inertia-link
                    :href="route('users.index')"
                    class="button is-light"
                >
                    Back
                </inertia-link>
            </div>
        </div>

        <hr>

        <div class="field">
            <label class="label">Full Name</label>
            <pre>{{ user.name }}</pre>
        </div>

        <div class="field">
            <label class="label">Email Address</label>
            <pre>{{ user.email }}</pre>
        </div>

        <div class="field">
            <label class="label">Verified</label>
            <pre>{{ user.email_verified_at ? new Date(user.email_verified_at).toLocaleDateString() : 'Not Verified' }}</pre>
        </div>

        <div class="field">
            <label class="label">Created</label>
            <pre>{{ new Date(user.created_at).toLocaleDateString() }}</pre>
        </div>

        <div class="field">
            <label class="label">Updated</label>
            <pre>{{ new Date(user.updated_at).toLocaleDateString() }}</pre>
        </div>
        
    </Layout>
</template>

<script>
import Layout from './../Components/Layout'

export default {
    props: {
        user: Object,
        flash: Object
    },
    
    components: {
        Layout
    }
}
</script>