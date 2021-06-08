<template>
    <div class="my-5">
        <nav class="pagination is-rounded" role="navigation" aria-label="pagination">

            <inertia-link
                v-if="links[0].url"
                :href="links[0].url"
                class="pagination-previous"
                v-html="links[0].label"
            />

            <a
                v-else
                class="pagination-previous"
                disabled
                v-html="links[0].label"
            />

            <inertia-link
                v-if="links[links.length - 1].url"
                :href="links[links.length - 1].url"
                class="pagination-next"
                v-html="links[links.length - 1].label"
            />

            <a
                v-else
                class="pagination-next"
                disabled
                v-html="links[links.length - 1].label"
            />

            <ul class="pagination-list">
                <li
                    v-for="(item, index) in links.slice(1, -1)"
                    :key="index"
                >
                    <inertia-link
                        :href="item.url"
                        :class="[`pagination-link`, {
                            'is-current': item.active
                        }]"
                    >
                        {{ item.label }}
                    </inertia-link>
                </li>
            </ul>

        </nav>
    </div>
</template>

<script>
export default {
    props: ['links']
}
</script>