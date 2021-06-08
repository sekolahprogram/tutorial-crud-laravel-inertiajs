<template>
    <Layout
        :message="flash.message"
    >
        <div class="level">
            <div class="level-left">
                <h1 class="title is-4">All Users</h1>
            </div>
            <div class="level-right">
                <inertia-link
                    :href="route('users.create')"
                    class="button is-light"
                >
                    Create
                </inertia-link>
            </div>
        </div>

        <hr>
        
        <div class="tabel-container">
            <table class="table is-fullwidth is-hoverable is-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Verified</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(user, index) in users.data"
                        :key="index"
                    >
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.email_verified_at ? new Date(user.email_verified_at).toLocaleDateString() : 'Not Verified' }}</td>
                        <td>{{ new Date(user.created_at).toLocaleDateString() }}</td>
                        <td>{{ new Date(user.updated_at).toLocaleDateString() }}</td>
                        <td class="buttons">
                            <inertia-link
                                :href="route('users.show', user.id)"
                                class="button is-small is-info"
                            >
                                Detail
                            </inertia-link>
                            <inertia-link
                                :href="route('users.edit', user.id)"
                                class="button is-small is-primary"
                            >
                                Edit
                            </inertia-link>
                            <a
                                @click="deleteUser(user.id)"
                                class="button is-small is-danger"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <Pagination
            :links="users.links"
        />
    </Layout>
</template>

<script>
import Layout from './../Components/Layout'
import Pagination from './../Components/Pagination'

export default {
    props: {
        users: Object,
        flash: Object
    },
    
    components: {
        Layout,
        Pagination
    },

    methods: {
        deleteUser(id) {
            if (!confirm('Are you sure to delete this user?')) {
                return;
            }

            this.$inertia.delete(this.route('users.destroy', id))
        }
    }
}
</script>