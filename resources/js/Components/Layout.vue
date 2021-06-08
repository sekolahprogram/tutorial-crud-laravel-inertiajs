<template>
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <inertia-link
                    :href="route('users.index')"
                    class="navbar-item"
                >
                    Home
                </inertia-link>

                <a
                    @click="isNavbar = !isNavbar"
                    :class="['navbar-burger', {
                        'is-active': isNavbar
                    }]"
                >
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div
                :class="['navbar-menu', {
                    'is-active': isNavbar
                }]"
            >
                <div class="navbar-end">
                    <inertia-link
                        :href="route('users.index')"
                        class="navbar-item is-tab"
                    >
                        Users
                    </inertia-link>
                </div>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container">
            <div v-if="message" class="notification is-primary">
                <button class="delete" onclick="this.parentElement.style.display='none'" />
                {{ message }}
            </div>
            <slot />
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>©2021 Febri Hidayan</strong>
            </p>
        </div>
    </footer>
</template>

<script>
export default {
    props: {
        message: String
    },

    data() {
        return {
            isNavbar: false
        }
    }
}
</script>