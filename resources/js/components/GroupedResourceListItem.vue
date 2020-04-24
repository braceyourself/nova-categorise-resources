<template>
    <li class="leading-wide my-1 text-sm" style="list-style: none;" :key="key">
        <router-link :to="link_data" class="text-white no-underline dim">

            {{ resource.label }}

        </router-link>
    </li>
</template>

<script>
    export default {
        name: "GroupedResourceListItem",
        props: ['resource', 'key'],
        mounted() {
            console.log("GroupedResourceListItem mounted", this.resource, this.key)
        },
        computed: {
            link_data() {
                return {
                    name: 'index',
                    params: {
                        resourceName: this.resource.uriKey
                    }
                }
            },
        }
    }
</script>
